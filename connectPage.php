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
        $sql = "SELECT * FROM users WHERE mdp = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Le mot de passe existe dans la base de données, l'utilisateur est connecté
            echo ("Hello world");
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