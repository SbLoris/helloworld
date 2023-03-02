
<?php

require_once("api/connectDB.php");
require_once("api/apiStatsRDV.php");
$conn = new DatabaseConnection();

$stats = new statsRDV($conn);

$totalRDV = $_SESSION['result1'];
$totalRDV7days = $_SESSION['result2'];
$totalClientVu = $_SESSION['result3'];

$data = [$totalRDV,$totalRDV7days,$totalClientVu];

print json_encode($data);
?>

