<?php 

require_once("../api/includeAll.php");
$mysqli = new DatabaseConnection();
var_dump($_POST);

$id = $_POST['id'];


$result = mysqli_query(
    $mysqli->mysqli,
    "DELETE 
    FROM rendezvous
    WHERE id_client = '$id';"    
);

$result = mysqli_query(
    $mysqli->mysqli,
    "DELETE
    FROM clients
    WHERE id = '$id';"    
);
header('location:'.$_SERVER['HTTP_REFERER']);
 ?>

