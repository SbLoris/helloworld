<?php 

require_once("../api/includeAll.php");
$conn = new DatabaseConnection();
var_dump($_POST);

$id = $_POST['id'];


$result = mysqli_query(
    $conn->mysqli,
    "DELETE 
    FROM rendezvous
    WHERE id_client = '$id';"    
);

$result = mysqli_query(
    $conn->mysqli,
    "DELETE
    FROM clients
    WHERE id = '$id';"    
);
header('location:'.$_SERVER['HTTP_REFERER']);
 ?>

