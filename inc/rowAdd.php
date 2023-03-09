<?php
require_once("../api/includeAll.php");
$conn = new DatabaseConnection();
// Check connection
/* if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} */

function apostropheVerif($var){
  $array = null;
  foreach(str_split($var) as $add){
    $add = $add == "'" ? "''":$add;
    var_dump($add);
    $array = $array . $add;
  }
  $var = $array;
  echo('<br>' . $var . '<br>');
  return $var;
  }

$client = $_POST['client'];

$start = apostropheVerif($_POST['addStart']);
$end = apostropheVerif($_POST['addEnd']);
$name = apostropheVerif($_POST['client']);
$address = apostropheVerif($_POST['addAddress']);
$commentary = apostropheVerif($_POST['addCommentary']);
$idUser = $_SESSION['idUser'];
if($_POST['client'] == 0){
  header('location:../accueil.php?requete=denied#popup2');
}
$idClient = apostropheVerif($_POST['client']);


$result = mysqli_query(
  $conn->mysqli,
  "INSERT INTO rendezvous (date_debut, date_fin, commentaire, adresse_rdv, id_statut_rdv, id_user, id_client)
  VALUES ('$start', '$end', '$commentary', '$address',  '1', '$idUser' ,'$idClient');"    
);


header('location:../accueil.php?requete=accepte#popup2');
?>