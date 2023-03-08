<?php
require_once("connectDB.php");

class statsAdmin {

    private $db;
    public $seeAllClients;

    public function __construct() {
        $this->db = new DatabaseConnection();
        $this->seeAllClients = $this->seeAllClients();
    }

    public function rdvAgentsManager() {
        if (isset($_SESSION['voirClients'])){
            $sql = "SELECT nom, prenom, adresse, email, telephone
                    FROM clients";
            $result = $this->db->mysqli->query($sql);

            foreach ($result as $data) {
                return $data;
            }
        }
    }

}
?>