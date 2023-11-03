<?php
    // Verificar el estado de la sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // FUNCIÓN: Validación XSD
    function validateFile($fileName) {
        if(file_exists($fileName)) {
            $data = new DOMDocument();

            if($data->load($fileName)) {
                return $data->schemaValidate("../data/content.xsd");
            }
        }
        return false;
    }

    // FUNCIÓN: Conectar y ejecutar sentencia SQL del XSLT
    function executeStatement($db, $fileName) {
        $xsltFile = "../data/content.xslt";
    
        echo "XSLT File: " . $xsltFile . "<br>";
    
        //Cargar contenido del XSLT
        $xslt = new DOMDocument();
        $xslt->load($xsltFile);
    
        // contenido del XML
        $xml = new DOMDocument();
        $xml->load($fileName);
    
        // Conectar XML con XSLT
        $processor = new XSLTProcessor();
        $processor->importStylesheet($xslt);
    
        // Transformar XML con XSLT
        $sqlProcess = $processor->transformToXML($xml);
    
        // Ejecutar la sentencia SQL del XSLT
        $db->beginTransaction();
        $db->exec($sqlProcess);
        $db->commit();
    
        // Obtener el último ID del contenido insertado en la tabla
        $stmt = $db->query("SELECT MAX(contentId) as contentId FROM content");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastContentId = $row['contentId'];
    
        // Calcular el rango de los nuevos contentId insertados
        $contentsId = range($lastContentId - count(explode(';', $sqlProcess)) + 1, $lastContentId);
    
        // Verificar que los contentId existen en la tabla content
        $stmt = $db->prepare("SELECT contentId FROM content WHERE contentId = ?");
        $existingContentIds = array_filter($contentsId, function ($contentId) use ($stmt) {
            $stmt->execute([$contentId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        });
    
        return $existingContentIds;
    }

    if(!empty($_POST['content-submit'])) {
        if(empty($_FILES['fileToUpload']['name'])) {
            header('Location: ../pages/errors/contentError.php');
        } else {
            require "../config/connect.php";

            $fileDirectory = "../data/";
            $file = $fileDirectory . basename($_FILES['fileToUpload']['name']);
            $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Validaciones y ejecuciones
            if($_FILES['fileToUpload']['size'] === 0) {
                echo "No hay datos en el archivo.<br>";
            } elseif(file_exists($file)) {
                echo "El archivo ya existe.<br>";
            } elseif($_FILES['fileToUpload']['size'] > 500000) {
                echo "Excede el tamaño máximo.<br>";
            } elseif($fileExtension !== "xml") {
                echo "No es un archivo válido, carga uno XML.<br>";
            } elseif(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file)) {
                echo 'El archivo ' . htmlspecialchars(basename($_FILES['fileToUpload']['name'])) . ' ha sido cargado correctamente.<br>';
                $fileName = $fileDirectory . htmlspecialchars(basename($_FILES['fileToUpload']['name']));

                if(validateFile($fileName)) {
                    echo "El archivo es válido.<br>";
                    // Se llama a la función y se almacenan los ID del nuevo contenido
                    $contentsId = executeStatement($db, $fileName);

                    // Obtener el ID del usuario para la tabla connections
                    $userId = $_SESSION['userId'];

                    if(!empty($contentsId)) {
                        
                        // Insertar los contentsId junto con el userId en la tabla connections
                        $insertToConnections = $db->prepare("INSERT INTO connections (contentId, userId) VALUES (?, ?)");
            
                        foreach ($contentsId as $contentId) {
                            $insertToConnections->execute([$contentId, $userId]);
                        }

                        // Redirección a la página que confirma que los datos han sido guardados correctamente.
                        header('Location: ../pages/confirmed/contentConfirmed.php');
                        exit();
                    }
                } else {
                    echo "El archivo no es válido.<br>";
                }
            } else {
                echo "El archivo no se ha cargado.<br>";
            }
        }
    }
?>