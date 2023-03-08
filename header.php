<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_header.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/form.css">
    <title>Jules imobilier</title>
    
</head>
<header>
<div class="header">
  <a href="accueil.php"><img src="img/logo.png" class="logo"></img></a>
  
  <div class="header-right">
<<<<<<< HEAD
  <a class="<?php if ($page == 'accueil') {echo 'active';} ?>" href="accueil.php">Accueil</a>
  <a class="<?php if ($page == 'client') {echo 'active';} ?>" href="client.php">Clients</a>
=======
  <a class="class" href="accueil.php">Accueil</a>
  <a class="client" href="client.php">Clients</a>
  <?php 
      if ($_SESSION['id_profil'] == 1) {
        echo "<a href='equipe.php'>Gérer les équipes</a>";
      }
  ?>
>>>>>>> 7e6af352d92962644854989cbc9df2eacd507a01
  <a href="logout.php"><img src="img/deco.png" alt="Déconnexion"></a>
</div>
</div>
</header>