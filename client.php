<?php
require_once("api/includeAll.php");
include("header.php");
// Récupérer l'identifiant du rendez-vous à partir de la méthode GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$mysqli = new DatabaseConnection();
$result = mysqli_query($mysqli->mysqli, "SELECT id, nom, prenom, adresse, email, telephone FROM clients ");
if (!$result) {
    die('Erreur dans la requête : ' . mysqli_error($mysqli->mysqli));
}
while ($row = mysqli_fetch_assoc($result)) {
echo'
<html>
<head>
	<title>Page client</title>
	<link rel="stylesheet" type="text/css" href="css/style_client.css">
</head>
<body>
	<div class="card-container">
	<div class="card">
		<img src="https://via.placeholder.com/150" alt="Photo de profil">
		<h1>' . $row["nom"] . ' ' . $row["prenom"] . '</h1>
		<p><strong>Adresse :</strong> '. $row["adresse"] .'</p>
		<a href="mailto:'. $row["email"] .'"><strong>Email :</strong> '. $row["email"] .'</a>
		<p><strong>Téléphone :</strong>'. $row["telephone"] .'</p>
		<a class="modifier" href="#">Modifier </a>
	</div>
	</div>
  
</body>
</html>';
}



?>
<?php include ("footer.php");?>