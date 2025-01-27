<?php
include "../db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    
    $data = json_decode($json, true);
    
    if (isset($data['uid']) && isset($data['computer_name'])) {
        // Récupère le client_id
 
        $client_uid = (int)$data['uid'];
        $computer_name = $data['computer_name'];
        $username = $data['username'];
        $architecture = $data['architecture'];
        $windows_version = $data['windows_version'];

        $sql = "SELECT * FROM client_data WHERE uid = " . $client_uid;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $sql = "UPDATE client_data SET computer_name = '" . $computer_name . "', username = '" . $username . "', architecture = '" . $architecture . "', windows_version = '" . $windows_version . "' WHERE uid = " . $client_uid;
            mysqli_query($conn, $sql);
            $client_id = $row['id'];
        } else {
            $sql = "INSERT INTO client_data(uid, computer_name, username, architecture , windows_version) VALUES (" . $client_uid . ",'" . $computer_name . "','" . $username . "','" . $architecture . "','" . $windows_version . "')";
            mysqli_query($conn, $sql);
            $client_id = mysqli_insert_id($conn);
        }
        
        header('HTTP/1.1 200 OK');
        echo json_encode(['status' => 'success', 'client_id' => $client_id]);
    } else {

        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['status' => 'error', 'message' => 'client_id missing']);
    }
} else {

    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
