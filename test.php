
<?php
$servername = "localhost";
$username = "root";
$password = "" ;
$database = "julesimmobilier";

$conn = mysqli_connect($servername, $username, $password, $database);

$results = $conn->query("SELECT * FROM profil");
$data = array();
while ($result = $results->fetch_assoc() ){
    array_push($data, $result['id']);
}
print json_encode($data);
?>

