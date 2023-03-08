<?php

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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "julesimmobilier";

$id = $_POST['confirm'];
$start = $_POST['start'];
$end = $_POST['end'];
/* $name = apostropheVerif($_POST['name']) ; */
$address = apostropheVerif($_POST['address']);
$commentary = apostropheVerif($_POST['commentary']);

echo('<br>' . $id . '<br>' . $start . '<br>' . $end . '<br>' /* . $name . '<br>' */ . $address . '<br>' . $commentary);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql =
"UPDATE rendezvous
SET date_debut = '$start', date_fin = '$end', adresse_rdv = '$address',  commentaire = '$commentary'
WHERE id = '$id';";
var_dump($sql);
$result = $conn->query($sql);


/* header('location:../accueil.php'); */
?>