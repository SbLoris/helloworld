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
  $req = new statsRDV();
  $prenom =  $_SESSION["prenom"];
  echo "<link rel='stylesheet' href='css/style_accueil.css'> <div id='stats' class='message'>Bonjour $prenom</div>";

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
  let idprofil = <?php print json_encode ($_SESSION['id_profil']); ?>
  
  if (idprofil == 6) {

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

  }
</script>

<table id="RDV" border="1">
    <thead>
        <tr>
            <th>Dates</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($req->derniersRDV->num_rows > 0): ?>
            <?php while($row = $req->derniersRDV->fetch_assoc()): ?>
                <tr>
                    <td>
                        <table>
                            <tr><td><?php echo($row["date_debut"]); ?></td></tr>
                            <tr><td><?php echo($row["date_fin"]); ?></td></tr>
                        </table>
                    </td>
                    <td><?php echo($row["nom_client"]); ?></td>
                    <td><?php echo($row["adresse_rdv"]); ?></td>
                    <td><?php echo($row["commentaire"]); ?></td>
                    <td>
                        <form action="rdv.php" method="get">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="Voir le rendez-vous">
                        </form> 
                    </td>
                </tr>
            <?php endwhile; endif ?>
    </tbody>
</table>

<?php include ("footer.php");?>