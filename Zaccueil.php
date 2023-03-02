<?php require_once("api/includeAll.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:white;">
    <?php
        $conn = new DatabaseConnection();
        $idUser = $_SESSION["idUser"];
            if($idUser == false) {
                echo "Identifiant ou mot de passe incorrect, merci de réessayer";
                echo "<a href='index_login.php'><button>Se reconnecter</button></a>";
                exit();
            }
        
        echo "L'ID de l'utilisateur est le : $idUser";
        
    ?>

</body>
</html>