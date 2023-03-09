<?php 
  require_once ("api/includeAll.php");
  if (empty($_SESSION["idUser"])) {
    header("location: index_login.php?login=expire");
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_header.css">
    
    <?php if(isset($stylesheets)):foreach($stylesheets as $stylesheet): ?>
        <link rel="stylesheet" href=<?php echo($stylesheet) ?>>
    <?php endforeach; endif ?>
    
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Jules imobilier</title>
    
</head>
<header>
<div class="header">
  <a href="accueil.php"><img src="img/logo.png" class="logo"></img></a>
  <div class="header-right">
    <a class="class" href="accueil.php">Accueil</a>
    <a class="client" href="client.php">Clients</a>
    <?php 
        if ($_SESSION['id_profil'] == 1) {
          echo "<a href='equipe.php'>Gérer les équipes</a>";
        }
    ?>
    <a href="logout.php"><img src="img/deco.png" alt="Déconnexion"></a>
  </div>
</div>
</header>
<body>