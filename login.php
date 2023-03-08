<?php

require_once("api/includeAll.php");
$conn = new DatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_REQUEST["mail"];
    $password = $_REQUEST["mdp"];

    $sql = $conn->mysqli->prepare("SELECT prenom, id, team, id_profil
            FROM users 
            WHERE mail=? 
            AND mdp=MD5(?)");

    $sql->bind_param("ss", $username, $password);
    $sql->execute();

    $result = $sql->get_result();

    if (mysqli_num_rows($result) == 1) {
        foreach($result as $data){
            $_SESSION['idUser'] = $data['id'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['team'] = $data['team'];
            $_SESSION['id_profil'] = $data['id_profil'];
            header("location: accueil.php");
        }
    } else {
        header("Location: index_login.php?login=error");
    }
}

?>