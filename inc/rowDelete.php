<?php
require_once("../api/includeAll.php");
$conn = new DatabaseConnection();

/* if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} */
$id = $_POST['confirm'];

$result = mysqli_query(
  $conn->mysqli,
  "DELETE FROM `rendezvous` WHERE id = $id;"    
);


header('location:'.$_SERVER['HTTP_REFERER']);
?>