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