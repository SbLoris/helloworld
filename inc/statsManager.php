<?php 
  require_once("api/includeAll.php"); 

  if ($_SESSION['id_profil'] != 3) {
    echo "Vous n'avez pas les droits pour accéder à cette page";
    exit();
  } 
?>

<canvas id="myChart"width="500" height="250"></canvas>

<script>
    data = <?php print json_encode($count); ?>;

    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php print json_encode($agent); ?>,
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

<div border="1">
      <div class = "thead">
        <div class = "th">Dates</div>
        <div class = "th">Nom</div>
        <div class = "th">Adresse</div>
        <div class = "th">Commentaire</div>
        <div class = "th">Agent</div>
      </div>
    <?php if ($req->rdvAgentsManager->num_rows > 0): ?>
      <?php while($row = $req->rdvAgentsManager->fetch_assoc()): ?>
        <form action="" method="POST" class="form">
          <div class="godelete"><?php echo($row["id"]) ?></div>
          <div class = "dates">
            <div class = "start"><?php echo($row["date_debut"]); ?></div>
            <div class = "end"><?php echo($row["date_fin"]); ?></div>
          </div>
          <div class = "name"><?php echo($row["pnom_client"]); ?></div>
          <div class = "address"><?php echo($row["adresse_rdv"]); ?></div>
          <div class = "commentary"><?php echo($row["commentaire"]); ?></div>
          <div class = "agent"><?php echo($row["agent"]); ?></div>
        </form>
    <?php endwhile; endif ?>
</div>