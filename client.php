<?php
require_once("api/includeAll.php");
include("header.php");
// Récupérer l'identifiant du rendez-vous à partir de la méthode GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
  echo'Aucune informations concernant ce client';  
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
	<div class="card">
		<img src="https://via.placeholder.com/150" alt="Photo de profil">
		<h1>" . $row["pnom_client"] . "</h1>
		<p><strong>Adresse :</strong> '. $row["adresse"] .'</p>
		<a href="mailto:'. $row["email"] .'"><strong>Email :</strong> '. $row["email"] .'</a>
		<p><strong>Téléphone :</strong>'. $row["telephone"] .'</p>
	</div>
    <div class="modal" id="myModal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Contenu de la modal ici...</p>
  </div>
</div>
</body>
</html>';
}



?>
<?php include ("footer.php");?>