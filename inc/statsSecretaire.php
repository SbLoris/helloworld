<?php 
  require_once("api/includeAll.php"); 

  $auth = false;

  if ($_SESSION['id_profil'] == 5) {
    $auth = true;
  } 

  if ($_SESSION['id_profil'] == 2) {
    $auth = true;
  } 

  if($auth == false) {
  echo "Vous n'avez pas les droits pour accéder à cette page";
    exit();
  }
?>

<div border="1">
      <div class = "thead">
        <div class = "th">Dates</div>
        <div class = "th">Nom</div>
        <div class = "th">Adresse</div>
        <div class = "th">Commentaire</div>
        <div class = "th">Agent</div>
        <div class = "th">Team</div>
      </div>
    <?php if ($req->rdvAllAgents->num_rows > 0): ?>
      <?php while($row = $req->rdvAllAgents->fetch_assoc()): ?>
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
          <div class = "team"><?php echo($row["team"]); ?></div>
        </form>
    <?php endwhile; endif ?>
</div>