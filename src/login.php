<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="login_styles.css" />
    <link rel="icon" href="/src/content/favicon.ico" type="image/x-icon" />
</head>
<body>
    <div class="login-container">
        <div class="profile-pic">
            <img src="/src/content/photo-profil2.png" alt="Profil" id="profile-img" />
        </div>
        <form id="login-form" method="POST" action="login.php">
            <input type="text" id="username" name="username" placeholder="Nom du PC" /><br />
            <input type="password" id="pass" name="password" placeholder="Mot de passe session" /><br />
            <img src="/src/content/oeil-barree.png" id="eye" alt="Image oeil barré" onClick="changer()" />
            <button type="submit" class="login-button">Connexion</button>
        </form>
    </div>

    <script>
        function changer() {
            var motDePasse = document.getElementById("pass");
            if (motDePasse.type === "password") {
                motDePasse.type = "text";
            } else {
                motDePasse.type = "password";
            }
        }
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérifiez les informations d'identification ici (par exemple, en les comparant à une base de données)
        if ($username === 'correctUsername' && $password === 'correctPassword') {
            // Créez un cookie pour la session
            setcookie('user_session', 'session_value', time() + 3600, '/'); // 1 heure de validité
            header('Location: Dashboard.php');
            exit();
        } else {
            echo '<p>Nom d\'utilisateur ou mot de passe incorrect</p>';
        }
    }
    ?>
</body>
</html>