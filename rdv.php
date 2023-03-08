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
$result = mysqli_query($mysqli->mysqli, "SELECT CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.date_debut, RV.date_fin, RV.adresse_rdv, RV.commentaire, C.email, C.adresse, C.telephone FROM rendezvous RV LEFT JOIN clients C ON RV.id_client = C.id WHERE RV.id_client = $id ");



// Vérifier si la requête a réussi
if (!$result) {
    die('Erreur dans la requête : ' . mysqli_error($mysqli->mysqli));
}

// Afficher les informations du rendez-vous
echo "
<link rel='stylesheet' href='css/style_rdv.css'>
<link rel='stylesheet' href='css/normalize.css'>

<h2>Informations du rendez-vous</h2>";

while ($row = mysqli_fetch_assoc($result)) {
    echo'<div class="info">';
    echo'<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Adresse</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>
        <tr>
         
  ';
    echo "<td><a href='#' id='myLink'>" . $row["pnom_client"] . "</a></td>";
    echo "<td>" . $row["date_debut"] . "</td>";
    echo "<td>" . $row["date_fin"] . "</td>";
    echo "<td>" . $row["adresse_rdv"] . "</td>";
    echo "<td>" . $row["commentaire"] . "</td>";
    echo'</tr>
        </tbody>
</table> </div>
<div class="modal" id="myModal">
  <div class="modal-content">
    <span class="close">&times;</span>
    
		<img src="https://via.placeholder.com/150" alt="Photo de profil">
		<h1>' . $row["pnom_client"] . '</h1>
		<p><strong>Adresse :</strong> '. $row["adresse"] .'</p>
		<a href="mailto:'. $row["email"] .'"><strong>Email :</strong> '. $row["email"] .'</a>
		<p><strong>Téléphone :</strong>'. $row["telephone"] .'</p>
	
  </div>
</div>
<script src="js/script.js"></script>';
    
}

?>
<?php include ("footer.php");?>
