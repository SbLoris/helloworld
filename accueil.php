<?php require_once("api/includeAll.php"); ?>
<?php
  new DatabaseConnection();
  $idUser = $_SESSION["idUser"];
?>

<?php 
$stylesheets = array("css/form.css");
include ("header.php");

if (empty($_SESSION["idUser"])) {
  header("location: index_login.php");
}
?>

<?php
  $prenom =  $_SESSION["prenom"];
  echo "<link rel='stylesheet' href='css/style_accueil.css'> <div id='stats' class='message'>Bonjour $prenom<br> Content de vous revoir ! </div>";

  if ($_SESSION['id_profil'] == 6) {
    $req = new statsRDV();
    $totalRDV = $req->totalRDV();
    $totalRDV = $totalRDV['rdvTotal'];
    $rdvTotal7days = $req->totalRDV7days();
    $rdvTotal7days = $rdvTotal7days['rdvTotal7days'];
    $nbrClientVu = $req->totalClientVu();
    $nbrClientVu = $nbrClientVu['nbrClientVu'];
    $data = [$totalRDV, $rdvTotal7days, $nbrClientVu];
  } 
  
  else if ($_SESSION['id_profil'] == 5 || $_SESSION['id_profil'] == 2) {
    $req = new statsAdmin();
    include_once("inc/statsSecretaire.php");
  } 
  
  else if ($_SESSION['id_profil'] == 4) {
    echo "On nous a rien demandé pour lui";
  } 
  
  else if ($_SESSION['id_profil'] == 3) {
    $req = new statsAdmin();
    $data = $req->statsAgentsManager();
    $count[] = $data['rdvFini'];
    $agent[] = $data['agent'];
  } 
  
  else if ($_SESSION['id_profil'] == 1) {
    $req = new statsAdmin();
    $allRDV = $req->allRDV();
    $allRDV = $allRDV['allRDV'];
    $allRDV7Days = $req->allRDV7Days();
    $allRDV7Days = $allRDV7Days['allRDV7Days'];
    $data = [$allRDV, $allRDV7Days];

    $ranking = $req->rankingAgents();
    $count[] = $ranking['rdvFini'];
    $agent[] = $ranking['agent'];

    $nbr_clients = $req->countClients();
    $nbr_clients = $nbr_clients['nbr_clients'];
    echo("Le nombre total de clients est de $nbr_clients");
  }
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<?php 
  if ($_SESSION['id_profil'] == 6) {
    include_once("inc/statsAgent.php"); 
  } else if ($_SESSION['id_profil'] == 3) {
    include_once("inc/statsManager.php");
  } else if ($_SESSION['id_profil'] == 1) {
    include_once("inc/statsPresident.php"); 
  }
?>

<?php include ("footer.php");?>