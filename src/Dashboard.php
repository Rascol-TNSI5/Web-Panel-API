<?php
if (!isset($_COOKIE['user_session'])) {
    echo 'Autorisation incomplète';
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Dashboard disponible après la connexion." />
    <title>Mon Site Web</title>
    <link rel="stylesheet" href="Styles_Dashboard.css" />
</head>
<body>
    <h1>Bienvenue sur le Dashboard</h1>
    <!-- Contenu du Dashboard -->
</body>
</html>