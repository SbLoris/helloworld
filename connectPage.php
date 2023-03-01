<!DOCTYPE html>
<html>
	<?php


include_once("api/connectDB.php");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialisation de la variable $password_err
    $password_err = "";

    // Vérification du champ de saisie de mot de passe
    if (empty($_POST["Code"])) {
        $password_err = "Veuillez entrer un mot de passe.";
    } else {
        $password = $_POST["Code"];

        // Requête SQL pour vérifier si le mot de passe existe dans la base de données
        $sql = "SELECT * 
        FROM users 
        WHERE mail = '$mail'
        AND mdp = '$password';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Le mot de passe existe dans la base de données, l'utilisateur est connecté
            echo '
       
            <link rel="stylesheet" href="text/style.css">
            

            <link rel="stylesheet" href="text/normalize.css">
            <div class="logo-entete">
            <a  target="_blank"href="https://www.mongazon.org/"><img src=photos/logo-mongazon.png></img></a>
			<div id="myModal" class="modal">
			  <div class="modal-content">
  
				<span class="close">
        &times;</span>
				<h2 style="display: flex;
        justify-content: center;">Prise de rendez-vous</h2>
				<!-- Début de widget en ligne Calendly -->
				<div class="calendly-inline-widget" data-url="https://calendly.com/alt-tu-9ojvb91u/30min?background_color=D6D84C&text_color=ffffff&primary_color=6C6D07" style="min-width:320px;height:930px;"></div>
				<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
				<!-- Fin de widget en ligne Calendly -->
 
        <script src="text/script.js"> 
        
         </script>
				
			  </div>
			</div>
      ';
      exit;

            
        } else {
            // Le mot de passe n'existe pas dans la base de données, affichage d'un message d'erreur
            $password_err = "Le mot de passe entré est incorrect.";
        }
    }
}

// Fermeture de la connexion à la base de données
$conn->close();


?>



	
	
<head>
	<title>Page de connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="text/style.css">

   <link rel="stylesheet" href="text/normalize.css">
   <link rel="shortcut icon" href="photos/logo-mongazon.png type="image/x-icon">

   
	
</head>
<body>

	<div class="logo-entete">
	<a  target="_blank"href="https://www.mongazon.org/"><img src=photos/logo-mongazon.png></img></a>
</div>
	<div class="container">
		<h1>Connexion</h1>
		<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="Code"><br>
    <span style="color:red" class="error"><?php echo isset($password_err) ? $password_err : ""; ?></span><br>
    <input type="submit" value="Envoyer">
</form>



	</div>
	<footer>
    <div class="footer">
	<div class="grid-container">
  <div class="grid-item-1">
<img src=photos/logo-mongazon.png></img>
<p>1, rue du colombier BP 13624<br>
49036 ANGERS Cedex 01</p>
<p>Tél. : 02 41 66 41 33</p></div>

               
          
  
  <div class="grid-item-2">
	<div class="grid-item-2-img">
  <a target="_blank" href="https://www.facebook.com/pages/Institution-Mongazon/110884072306292?ref=br_rs"><img src=photos/rs-facebook.png></img></a>
  <a target="_blank" href="https://www.youtube.com/channel/UCoarKyTSnU46puUfZjY0oag"><img src=photos/rs-youtube.png></img></a>
  <a target="_blank" href="https://twitter.com/mongazon?lang=fr"><img src=photos/rs-twitter.png></img></a>
</div>


	<p><a href="mailto:accueil@mongazon.org">accueil@mongazon.org</a></p>
  <p><a href="mailto:secretariat-college@mongazon.org">secretariat-college@mongazon.org</a></p>
  <p><a href="mailto:secretariat-lycee@mongazon.org">secretariat-lycee@mongazon.org</a></p>
  <p><a href="mailto:sec-enseignement-superieur@mongazon.org">sec-enseignement-superieur@mongazon.org</a></p></div>
     
    </div>
	</div>
	<p class="text-footer">©Mongazon 2018 - tous droits réservés <a href="https://www.mongazon.org/institution/mentions-legales">| Mentions légales </a>| <a href="https://www.mongazon.org/institution/politique-de-protection-des-donnees"> Politique de protection des données.</p>

</footer>
</body>

</html>
