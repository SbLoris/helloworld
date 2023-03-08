<?php
    require_once("api/includeAll.php");
    include("header.php");

    if($_SESSION['id_profil'] != 1) {
        echo "Vous n'avez pas les droits pour accéder à cette page";
        exit();
    }

    echo "Hello boss";
?>