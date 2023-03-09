<?php

require_once("../api/includeAll.php");
$conn = new DatabaseConnection();

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

$id = $_POST['confirm'];
$start = $_POST['start'];
$end = $_POST['end'];
/* $name = apostropheVerif($_POST['name']) ; */
$address = apostropheVerif($_POST['address']);
$commentary = apostropheVerif($_POST['commentary']);

echo('<br>' . $id . '<br>' . $start . '<br>' . $end . '<br>' . $address . '<br>' . $commentary);

$result = mysqli_query(
  $conn->mysqli,
  "UPDATE rendezvous
  SET date_debut = '$start', date_fin = '$end', adresse_rdv = '$address',  commentaire = '$commentary'
  WHERE id = '$id';"
);

header('location:'.$_SERVER['HTTP_REFERER']);
?>