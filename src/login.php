<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Formulaire de Connexion</title>
		<link rel="stylesheet" href="login_styles.css" />
	</head>
	<body>
		<div class="login-container">
			<!-- Espace pour l'image de profil -->
			<div class="profile-pic">
				<img src="/src/content/photo-profil2.png" alt="Profil" id="profile-img" />
			</div>
			<form id="login-form">
				<!-- Champ pour entrer le nom d'utilisateur -->
				<input type="text" id="username" placeholder="Nom du PC" /><br />
				<!-- Champ pour entrer le mot de passe -->
				<input type="password" id="pass" placeholder="Mot de passe session" /><br />
				<img src="/src/content/oeil-barree.png" id="eye" alt="Image oeil barré" onClick="changer()" />
				<!-- Lien pour récupérer le mot de passe -->
				<button type="submit" class="login-button">Connexion</button>

				<script>
					function changer() {
						var motDePasse = document.getElementById("pass");
						if (motDePasse.type === "password") {
							motDePasse.type = "text";
						} else {
							motDePasse.type = "password";
						}
					}
					document.getElementById("login-form").addEventListener("submit", function(event) {
                    	event.preventDefault(); // Empêche la soumission du formulaire
                    	var username = document.getElementById("username").value;
                    	var password = document.getElementById("pass").value;
                    	console.info("Nom du PC:", username);
						console.info("Mot de passe session:", password);
                	});
				</script>
			</form>
		</div>
	</body>
</html>
