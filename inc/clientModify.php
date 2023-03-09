<?php 
require_once("../api/includeAll.php");
$conn = new DatabaseConnection();
var_dump($_POST);

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

$id = $_POST['id'];
$lastName = apostropheVerif($_POST['lastName']);
$firstName = apostropheVerif($_POST['firstName']);
$address = apostropheVerif($_POST['address']);
$email = apostropheVerif($_POST['email']);
$phone = apostropheVerif($_POST['phone']);

$result = mysqli_query(
    $conn->mysqli,
    "UPDATE clients
    set nom = '$lastName' , prenom = '$firstName', adresse = '$address', email = '$email', telephone = '$phone' 
    WHERE id = $id;"    
);


header('location:'.$_SERVER['HTTP_REFERER']);
?>