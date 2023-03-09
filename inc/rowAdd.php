<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "julesimmobilier";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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
echo($client . '<br>');
$start = apostropheVerif($_POST['addStart']);
$end = apostropheVerif($_POST['addEnd']);
$name = apostropheVerif($_POST['addName']);
$address = apostropheVerif($_POST['addAddress']);
$commentary = apostropheVerif($_POST['addCommentary']);


$sql =
"INSERT INTO rendezvous (date_debut, date_fin, nom_client, commentaire, adresse_rdv, id_statut_rdv, id_user)
VALUES ('$start', '$end', '$name', '$address', '$commentary', '1', '4');";
$result = $conn->query($sql);



/* header('location:../accueil.php'); */
?>