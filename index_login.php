<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "julesimmobilier";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}


// Vérification du formulaire soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupération des données soumises
  $username = $_REQUEST["mail"];
  $password = $_REQUEST["mdp"];

  // Requête pour vérifier si le login et le mot de passe existent dans la base de données
  $sql = "SELECT * FROM users WHERE mail='$username' AND mdp=MD5('$password')";
  $result = mysqli_query($conn, $sql);

  // Vérification du résultat de la requête
  if (mysqli_num_rows($result) == 1) {
    // Login et mot de passe corrects
    header("Location: dashboard.php"); // Redirection vers la page de connexion réussie
  } else {
    // Login ou mot de passe incorrects
    echo "Login ou mot de passe incorrects.";
  }
}

// Fermeture de la connexion
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Login page </title>
</head>
<header>
    <div class="logo-principal">
    <h1>Hello. <br> Welcome back</h1> 
    <img src="img/Logo.png" class="photo">
    
</div>
</header>
<body>
    
	<form action="" method="post">
		<label for="username">Nom d'utilisateur :</label>
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
    
	<script>
		function showPassword() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
    
</body>
</html>