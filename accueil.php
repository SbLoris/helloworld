<?php require_once("api/includeAll.php"); ?>
<?php
  new DatabaseConnection();
  $idUser = $_SESSION["idUser"];
    if($idUser == false) {
      echo "Identifiant ou mot de passe incorrect, merci de réessayer";
      echo "<a href='index_login.php'><button>Se reconnecter</button></a>";
      exit();
    }
?>
<?php include ("header.php");?>
<?php require_once("api/includeAll.php"); ?>

<link rel="stylesheet" href="css/style_accueil.css">
<<<<<<< HEAD
 <div class="stats"></div>
 <div class="planning"></div>
 <div class="RDV"></div>
 
=======
>>>>>>> 1c08785d7b9718770f88968390a78e635b2266a4

<?php
  new statsRDV();
  $prenom =  $_SESSION["prenom"];
  echo "Bonjour $prenom";

  $data = [$_SESSION['result1'], $_SESSION['result2'], $_SESSION['result3']];     
?>

<div class="container">
  <canvas id="myChart"></canvas>
</div>

<div class="blank"></div>

<div class="container second">
  <div class="item">
    <div class="img img-first"></div>
    <div class="card">
      <h3>Jules Immobilier</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga aut facilis harum dolorum, omnis optio!</p>
      <a href="#">En savoir plus</a>
    </div>
  </div>
  <div class="item">
    <div class="img img-second"></div>
    <div class="card">
      <h3>Jules immobilier</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, numquam!</p>
      <a href="#">En savoir plus</a>
    </div>
  </div>
  <div class="item">
    <div class="img img-third"></div>
    <div class="card">
      <h3>Jules immobilier</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, vel!</p>
      <a href="#">En savoir plus</a>
    </div>
  </div>
</div>

<div class="blank"></div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  data = <?php print json_encode($data); ?>

  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Nombre de RDV', 'RDV 7 derniers jours', 'Clients vus'],
      datasets: [{
        label: '#RDV',
        data: data,
        backgroundColor:['#FF0000', '#00ff00', '#0000ff'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?php include ("footer.php");?>