

<div class="container">
  <div class="produit">
      <a href="#popup" class="button" id="Stats"><h1>Statistiques</h1></a>

      <div id="popup" class="overlay">
          <div class="popup">
              <h2>Statistiques</h2>
              <a href="#" class="cross">&times;</a>
              <canvas id="myChart"width="500" height="250"></canvas>
          </div>
      </div>
  </div>
  <div class="produit">
      <a href="#popup2" class="button" id="RDV"><h1>Rendez-vous</h1></a>

        <div id="popup2" class="overlay">
          <div class="popup">
              <h2>Rendez-vous</h2>
              <a href="#" class="cross">&times;</a>
              <div border="1">
                <div class = "thead">
                  <div class = "th">Dates</div>
                  <div class = "th">Nom</div>
                  <div class = "th">Adresse</div>
                  <div class = "th">Commentaire</div>
                </div>
                <?php if ($req->derniersRDV->num_rows > 0): ?>
                  <?php while($row = $req->derniersRDV->fetch_assoc()): ?>
                    <form action="" method="POST" class="form">
                      <div class="godelete"><?php echo($row["id"]) ?></div>
                      <div class = "dates">
                        <div class = "start"><?php echo($row["date_debut"]); ?></div>
                        <div class = "end"><?php echo($row["date_fin"]); ?></div>
                      </div>
                      <div class = "name"><?php echo($row["pnom_client"]); ?></div>
                      <div class = "address"><?php echo($row["adresse_rdv"]); ?></div>
                      <div class = "commentary"><?php echo($row["commentaire"]); ?></div>
                      <div class="buttons">
                        <button class="modify">Modifier</button>
                        <button class="delete">Supprimer</button>
                        <input type="hidden" name="confirm" class="confirm" value="">
                      </div>
                    </form>
                <?php endwhile; endif ?>
                <form action="inc/rowAdd.php" method="POST" class="form">
                  <div class = "dates">
                    <input type="datetime-local" class = "start" name = 'addStart'>
                    <input type="datetime-local" class = "end" name = 'addEnd'>
                  </div>
                  <select name="client" class="selectClientTd">
                    <option value="0">Choisir un client:</option>
                    <?php if ($req->listeClients->num_rows > 0): ?>
                      <?php while($row = $req->listeClients->fetch_assoc()):?>
                        <option value="<?php echo($row['id']) ?>"><?php echo($row['nom'] . " " . $row['prenom']); ?></option>
                      <?php endwhile; endif ?>
                      <option class = "addClient" value="addClient">Ajouter Client</option>
                  </select>
                  <input class = "address" name = 'addAddress'>
                  <input class = "commentary" name = 'addCommentary'>
                  <button class="addClient">Ajouter</button>
                </form>
              </div>
          </div>
        </div>
    </div>
  </div>
            

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