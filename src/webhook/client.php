<?php
include "../db.php";
// Vérifie si la requête est une méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère le contenu de la requête
    $json = file_get_contents('php://input');
    
    // Décode le JSON en tableau associatif
    $data = json_decode($json, true);
    
    // Vérifie si le champ client_id existe dans les données
    if (isset($data['uid']) && isset($data['computer_name'])) {
        // Récupère le client_id
 
        $client_uid = $data['uid'];
        $computer_name = $data['computer_name'];
        $username = $data['username'];
        $architecture = $data['architecture'];
        $windows_version = $data['windows_version'];
        
        $sql = "INSERT INTO client_data(uid, computer_name, username, architecture , windows_version) VALUES (" . $client_uid . ",'" . $computer_name . "','" . $username . "','" . $architecture . "','" . $windows_version . "')";
        mysqli_query($conn, $sql);

        // Écrit le contenu dans le fichier
        file_put_contents($file_path, $log_entry, FILE_APPEND | LOCK_EX);
        
        // Renvoie une réponse pour indiquer que la requête a été traitée avec succès
        header('HTTP/1.1 200 OK');
        echo json_encode(['status' => 'success', 'client_id' => $client_id]);
    } else {
        // Renvoie une réponse d'erreur si client_id n'est pas présent
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['status' => 'error', 'message' => 'client_id missing']);
    }
} else {
    // Renvoie une réponse d'erreur si la méthode n'est pas POST
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
