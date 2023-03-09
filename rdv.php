<?php
require_once("api/includeAll.php");
include("header.php");

$mysqli = new DatabaseConnection();

// Récupérer l'identifiant du rendez-vous à partir de la méthode GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($mysqli->mysqli,
     "SELECT CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.date_debut, RV.date_fin, RV.adresse_rdv, RV.commentaire,RV.id_statut_rdv, C.email, C.adresse, C.telephone
     FROM rendezvous RV 
     LEFT JOIN clients C ON RV.id_client = C.id
     WHERE RV.id_client = $id ");

}
else {
    $id = $_SESSION['idUser'];
    $auth = false;

    if($_SESSION['id_profil'] == 1) {
      $auth = true;
    }
    if($_SESSION['id_profil'] == 2) {
      $auth = true;
    }
    if($_SESSION['id_profil'] == 5)
    {
      $auth = true;
    }

    if($_SESSION['id_profil'] == 6) {
      $result = mysqli_query($mysqli->mysqli,
      "SELECT CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.date_debut, RV.date_fin, RV.adresse_rdv, RV.commentaire,RV.id_statut_rdv, C.email, C.adresse, C.telephone 
      FROM rendezvous RV 
      LEFT JOIN clients C ON RV.id_client = C.id 
      WHERE RV.id_user = $id ");

      if (mysqli_num_rows($result) == 0) {
        echo("Vous n'avez pas de RDV de disponible");
      }
    }

    if($auth == true) {
      $result = mysqli_query($mysqli->mysqli,
      "SELECT CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.date_debut, RV.date_fin, RV.adresse_rdv, RV.commentaire,RV.id_statut_rdv, C.email, C.adresse, C.telephone, CONCAT (U.nom, ' ', U.prenom) AS agent
      FROM rendezvous RV 
      LEFT JOIN clients C ON RV.id_client = C.id
      LEFT JOIN users U ON RV.id_user = U.id");

      if (mysqli_num_rows($result) == 0) {
        echo("Vous n'avez pas de RDV de disponible");
      }
    }

    if($_SESSION['id_profil'] == 3) {
      $team = $_SESSION['team'];

      $result = mysqli_query($mysqli->mysqli,
      "SELECT CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.date_debut, RV.date_fin, RV.adresse_rdv, RV.commentaire,RV.id_statut_rdv, C.email, C.adresse, C.telephone, CONCAT (U.nom, ' ', U.prenom) AS agent
      FROM rendezvous RV 
      LEFT JOIN clients C ON RV.id_client = C.id
      LEFT JOIN users U ON RV.id_user = U.id
      WHERE U.team = '$team' ");

      if (mysqli_num_rows($result) == 0) {
        echo("Vous n'avez pas de RDV de disponible");
      }
    }
}


// Récupérer les informations du rendez-vous depuis votre base de données en utilisant $id_rendezvous




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
            <th>Statut RDV</th>
            <th>Agent</th>
        </tr>
    </thead>
    <tbody>
        <tr>
         
  ';
    echo "<td><a href='#' class='myLink'>" . $row["pnom_client"] . "</a></td>";
    echo "<td>" . $row["date_debut"] . "</td>";
    echo "<td>" . $row["date_fin"] . "</td>";
    echo "<td>" . $row["adresse_rdv"] . "</td>";
    echo "<td>" . $row["commentaire"] . "</td>";
    echo "<td>";
    if ($row["id_statut_rdv"] == 1) {
        echo "Rendez-vous en cours";
      } else if ($row["id_statut_rdv"] == 2) {
        echo "Rendez-vous terminé";
      };
    echo "<td>" . $row["agent"] . "</td>";
    echo'</tr>
        </tbody>
</table> </div>
<div class="modal" class="myModal">
  <div class="modal-content">
    <span class="close">&times;</span>
        <div class="photo-profil">
		<img src="https://via.placeholder.com/150" alt="Photo de profil">
        </div>
		<h1>' . $row["pnom_client"] . '</h1>
		<p><strong>Adresse :</strong> '. $row["adresse"] .'</p>
		<a href="mailto:'. $row["email"] .'"><strong>Email :</strong> '. $row["email"] .'</a>
		<p><strong>Téléphone :</strong>'. $row["telephone"] .'</p>
	
  </div>
</div>';
    
}
?>
<script src="js/script.js"></script>
<?php include ("footer.php");?>
