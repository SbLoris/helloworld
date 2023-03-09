<?php 
  require_once("api/includeAll.php"); 

  if ($_SESSION['id_profil'] != 1) {
    echo "Vous n'avez pas les droits pour accéder à cette page";
    exit();
  } 
?>

<canvas id="myChart"width="500" height="250"></canvas>
<canvas id="myOtherChart"width="500" height="250"></canvas>

<script>
    data = <?php print json_encode($data); ?>

    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Nombre de RDV total', 'Total RDV des 7 derniers jours'],
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

<script>
    data = <?php print json_encode($count[0]); ?>;
    labels = <?php print json_encode($agent[0]); ?>;

    const ctxs = document.getElementById('myOtherChart');
    new Chart(ctxs, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Classement des agents',
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