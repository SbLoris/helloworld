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
<style>
  :root {
    --color: #333;
}

body {
    font-family: 'Open Sans', sans-serif;
    background-color: blueviolet;
}

.container {
    display: flex;
    flex-direction: column;
}


.menu {
    display: flex;
    flex-direction: column;
}




/* Début Page */

.page .ligne {
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 25px;
    flex-wrap: wrap;
}

.page .ligne img {
    margin: 40px;
    border-radius: 10%;
    cursor: pointer;
    transition-duration: 1s;
}

.page .ligne img:hover {
    transform: scale(1.5);
}

.produit img {
    border-radius: 10%;
    cursor: pointer;
}

.produit {
    display: flex;
    flex-direction: column;
    width: 25%;
    font-family: Arial, Helvetica;
}


/*Fin Page*/

.button {
    text-align: center;
    font-size: 1.3rem;
    padding: 0.5rem;
    color: #fff;
    border-radius: 20px/50px;
    text-decoration: none;
    cursor: pointer;
    background: #34495e;
    transition: all 0.3s ease-out;
}

.button:hover {
    background: #9C2F51;
}

.overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity .4s;
    visibility: hidden;
    opacity: 0;
}

.overlay:target {
    visibility: visible;
    opacity: 1;
}

.popup {
    text-align: center;
    margin: 6rem auto;
    padding: 2rem;
    background: #fff;
    border-radius: 5px;
    width: 45%;
    position: relative;
    transition: all 0.4s ease-in-out;
}

.popup .cross {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    font-size: 2rem;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s ease;
    color: #333;
    font-family: Arial, Helvetica;
}

.popup .cross:hover {
    color: #12FCF8;
}



</style>

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
    $nbr_clients = $req->countClients();
    $nbr_clients = $nbr_clients['nbr_clients'];
    echo("Le nombre total de clients est de $nbr_clients");
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