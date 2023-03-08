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

<table border="1">
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
                    <td><?php echo($row["pnom_client"]); ?></td>
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