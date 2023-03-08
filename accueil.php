<?php require_once("api/includeAll.php"); ?>
<?php
  new DatabaseConnection();
  $idUser = $_SESSION["idUser"];
?>

<?php include ("header.php");

if (empty($_SESSION["idUser"])) {
  header("location: index_login.php");
}
?>

<link rel="stylesheet" href="css/style_accueil.css">
<style>
  :root {
    --color: #333;
}

body {
    font-family: 'Open Sans', sans-serif;
}

.container {
    display: flex;
    flex-direction: column;
}


.menu {
    display: flex;
    flex-direction: column;
}

.produit img {
    border-radius: 10%;
    cursor: pointer;
    width: 400px;
    height: 250px;
}

.produit {
    display: flex;
    flex-direction: column;
    width: 25%;
    font-family: Arial, Helvetica;
}

.button {
    text-align: center;
    font-size: 1.3rem;
    padding: 0.5rem;
    color: #fff;
    border-radius: 20px/50px;
    text-decoration: none;
    cursor: pointer;
    background: url('https://medias.pourlascience.fr/api/v1/images/view/5a82ac868fe56f032c48000e/wide_1300/image.jpg');
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

<div class="container">
  <canvas id="myChart"width="500" height="100"></canvas>
  <ul class="menu">
        <li><a href="#RDV">RDV</a></li>
        <li><a href="#stats">Statistiques</a></li>
        
        <li><a href="#">Planning</a></li>
        <li><a href="#">Feuilles de suivies</a></li>
    </ul>
            <div class="produit">
                <a href="#popup" class="button"><h1>Statistiques</h1></a>

                <div id="popup" class="overlay">
                    <div class="popup">
                        <h2>Statistiques</h2>
                        <a href="#" class="cross">&times;</a>
                        <canvas id="myChart"width="500" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="produit">
                <img src="https://medias.pourlascience.fr/api/v1/images/view/5a82ac868fe56f032c48000e/wide_1300/image.jpg" alt="">
                <a href="#popup" class="button">Rendez-vous</a>
            </div>
</div>

<div class="container">
  <canvas id="myOtherChart"></canvas>
</div>



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