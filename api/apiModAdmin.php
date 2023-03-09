<?php
require_once("connectDB.php");

class modAdmin {

    private $db;
    public $addEmploye;
    public $seeRoles;

    public function __construct() {
        $this->db = new DatabaseConnection();
        $this->addEmploye = $this->addEmploye();
        $this->seeRoles = $this->seeRoles();
    }

    public function addEmploye() {
        if (isset($_SESSION['addEmploye'])){
            $name = $_REQUEST["name"];
            $username = $_REQUEST["username"];
            $mail = $_REQUEST["mail"];
            $password = $_REQUEST["password"];
            $team = $_REQUEST["team"];
            $id_profil = $_REQUEST["id_profil"];

            $sql = "INSERT INTO users(nom, prenom, mail, mdp, team, id_profil)
                    VALUES ('$name', '$username', '$mail', MD5('$password'), '$team', '$id_profil')";

            $result = $this->db->mysqli->query($sql);
        }
    }

    public function seeRoles() {
        $sql = "SELECT *
                FROM profil";

        $result = $this->db->mysqli->query($sql);

        return $result;
    }

}
?>