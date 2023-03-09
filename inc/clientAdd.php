<?php
$servername = "localhost";
$username = "root";
$password = "";
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

  var_dump($_POST);

$lastName = apostropheVerif($_POST['addLastName']);
$firstName = apostropheVerif($_POST['addFirstName']);
$address = apostropheVerif($_POST['addAddress']);
$email = apostropheVerif($_POST['addEmail']);
$phone = apostropheVerif($_POST['addPhone']);


$sql =
"INSERT INTO clients (nom, prenom, adresse, email, telephone)
VALUES ('$lastName', '$firstName', '$address', '$email', '$phone');";
$result = $conn->query($sql);




header('location:'.$_SERVER['HTTP_REFERER']);
?>