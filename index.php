<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "julesimmobilier";

$conn = new mysqli($servername, $username, $password, $dbname);

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
        $sql = "SELECT * FROM codesecret WHERE Code = '$password'";
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