<?php require_once("api/includeAll.php"); ?>
<?php
  new DatabaseConnection();
  $idUser = $_SESSION["idUser"];
    if($idUser == false) {
      header("Location: index_login.php?login=error");
      exit();
    }
?>
<?php include ("header.php");?>
<?php require_once("api/includeAll.php"); ?>

<link rel="stylesheet" href="css/style_accueil.css">

<?php
  $prenom =  $_SESSION["prenom"];
  echo "<link rel='stylesheet' href='css/style_accueil.css'> <div id='stats' class='message'>Bonjour $prenom</div>";

  if ($_SESSION['id_profil'] == 6) {
    $req = new statsRDV();
    $data = [$_SESSION['result1'], $_SESSION['result2'], $_SESSION['result3']];  
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
    $data = [$_SESSION['allRDV'], $_SESSION['allRDV7Days']];
  }
?>

<div class="container">
  <canvas id="myChart"width="500" height="100"></canvas>
  <div class="menu">
  <ul class="navbar">
    <li><a href="accueil.php"><img src="img/logo.png" alt=""></a></li>
        <li><a href="#RDV">RDV</a>
        <!--<ul>
            <li><a href="#">Récents</a></li>
            <li><a href="#">A venir</a></li>
        </ul>--></li>
        <li><a href="#stats">Statistiques</a></li>
        
        <li><a href="#">Planning</a></li>
        <li><a href="#">Feuilles de suivies</a></li>
        <div class="deco">
        <li id="deco"><a href="index_login.php"><img src="img/deco.png" alt=""></a></li></div>
    </ul>
  </div>
</div>

<div class="blank"></div>

<div class="blank"></div>

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