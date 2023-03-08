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