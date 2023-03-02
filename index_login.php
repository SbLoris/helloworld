<?php
	// Connexion à la base de données
	require_once("api/connectDB.php");
	include_once("api/apiStatsRDV.php");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Login page </title>
</head>
<header>
    <div class="logo-principal">
    <h1>Hello.</h1>
    <h1>Welcome back</h1> 
    <img src="img/Logo.png" class="photo">
    
</div>
</header>
<body>
    
	<form action="" method="post">
		<label for="username" class="custom-checkbox">Nom d'utilisateur :</label>
		<input type="text" id="username" name="mail" required><br><br>
		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="mdp" required>
		<input type="checkbox" onclick="showPassword()"> Afficher/masquer le mot de passe<br><br>
		<input type="submit" value="Se connecter">
		<a href="#">Mot de passe oublié ?</a>
	</form>
    <div class="creationCompte">
    <a href="#">Créer un compte</a>
</div>  
</body>
</html>