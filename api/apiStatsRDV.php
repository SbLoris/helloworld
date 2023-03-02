<?php

require_once("connectDB.php");

class statsRDV {
        private $db;
        public $totalRDV;
        public $totalRDV7days;
        public $totalClientVu;
    
        public function __construct() {
            $this->db = new DatabaseConnection();
            $this->totalRDV = $this->totalRDV();
            $this->totalRDV7days = $this->totalRDV7days();
            $this->totalClientVu = $this->totalClientVu();
        }
    
        // Nombre de rendez-vous total pour l'agent connecté
        public function totalRDV() {
                if (isset($_SESSION['idUser'])){
                        $idUser = $_SESSION['idUser'];
                        $sql = "SELECT COUNT(*) as rdvTotal
                                FROM rendezvous
                                WHERE id_user = $idUser;";
                        $result1 = $this->db->mysqli->query($sql);

                        foreach ($result1 as $data) {
                                return $_SESSION['result1'] = $data['rdvTotal'];
                        }
                }
        }

        // Nombre de rendez-vous sur les 7 derniers jours pour l'agent connecté
        public function totalRDV7days() {
                if (isset($_SESSION['idUser'])){
                        $idUser = $_SESSION['idUser'];
                        $sql = "SELECT COUNT(*) as rdvTotal7days
                                FROM rendezvous
                                WHERE id_user = $idUser
                                AND date_fin > DATE_SUB(NOW(), INTERVAL -7 DAY);";
                        $result2 = $this->db->mysqli->query($sql);

                        foreach ($result2 as $data) {
                                return $_SESSION['result2'] = $data['rdvTotal7days'];
                        }
                }
        }

        // Nombre de clients vu pour l'agent connecté
        public function totalClientVu() {
                if (isset($_SESSION['idUser'])){
                        $idUser = $_SESSION['idUser'];
                        $sql = "SELECT COUNT(*) as nbrClientVu
                                FROM rendezvous
                                WHERE id_user = $idUser
                                AND id_statut_rdv = 2;";
                        $result3 = $this->db->mysqli->query($sql);

                        foreach ($result3 as $data) {
                                return $_SESSION['result3'] = $data['nbrClientVu'];
                        }
                }
        }
}