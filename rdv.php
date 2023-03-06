<?php
require_once("api/includeAll.php");
include("header.php");

// Récupérer l'identifiant du rendez-vous à partir de la méthode GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
  echo'Aucune informations concernant ce rdv';  
}


// Récupérer les informations du rendez-vous depuis votre base de données en utilisant $id_rendezvous
$mysqli = new DatabaseConnection();
$result = mysqli_query($mysqli->mysqli, "SELECT * FROM rendezvous WHERE id = '$id'");

// Vérifier si la requête a réussi
if (!$result) {
    die('Erreur dans la requête : ' . mysqli_error($mysqli->mysqli));
}

// Afficher les informations du rendez-vous
echo "<h2>Informations du rendez-vous</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>Date : " . $row['date_debut'] . "</p>";
    echo "<p>Heure : " . $row['date_fin'] . "</p>";
    echo "<p>Lieu : " . $row['nom_client'] . "</p>";
    echo "<p>Adresse : " . $row['adresse_rdv'] . "</p>";
    echo "<p>Commentaire : " . $row['commentaire'] . "</p>";
}

?>
<?php include ("footer.php");?>
