<?php
	// Connexion à la base de données
	require_once("api/includeAll.php");

	$conn = new DatabaseConnection();

	// Vérification de la connexion
	if (!$conn) {
		die("Connexion échouée: " . mysqli_connect_error());
	}
	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
	<script src="https://kit.fontawesome.com/ef6de71bd8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <title>Login page</title>
</head>
<header>
	<div class="logo">
    <img src="img/Logo.png" class="photo">
	</div>

    <div class="titre">
    <h1>Hello.</h1>
    <h1>Welcome back</h1>
	</div> 
	
</header>
<body>
    
	<form action="accueil.php" method="post" class="login-mod">
		<p>Nom d'utilisateur :</p>
		<input type="text" id="username" name="mail" placeholder="Votre identifiant" required>
         
		<div class="password-field">
		<p>Mot de passe :</p>
<input type="password" id="fakePassword" name="mdp" placeholder="Votre mot de passe" />
<i id="toggler"class="fa-sharp fa-solid fa-eye-slash"></i> 
</div>

		<div class="boutton">
		<input type="submit" value="Se connecter">
		</div>
	<div class="mdp-forgot">
		<a href="#">Mot de passe oublié ?</a>
	</div>
	</form>

    <div class="creationCompte">
   		<a href="#">Créer un compte</a>
	</div>

	<?php
		if (isset($_GET['login'])) {
			$login = $_GET['login'];
			if($login == "error") {
				echo "<div class='error'>Mot de passe ou identifiant incorrect </div> ";
			}
		}
	?>
    
	<script src="js/fonction.js"></script>
    
</body>
</html>