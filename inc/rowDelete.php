<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "julesimmobilier";
$id = $_POST['confirm'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM `rendezvous` WHERE id = $id;";
$result = $conn->query($sql);



header('location:'.$_SERVER['HTTP_REFERER']);
?>