<?php

require_once("connectDB.php");

class statsRDV {
        private $db;
        public $totalRDV;
        public $totalRDV7days;
        public $totalClientVu;
        public $derniersRDV;
        public $listeClients;
    
        public function __construct() {
            $this->db = new DatabaseConnection();
            $this->totalRDV = $this->totalRDV();
            $this->totalRDV7days = $this->totalRDV7days();
            $this->totalClientVu = $this->totalClientVu();
            $this->derniersRDV = $this->derniersRDV();
            $this->listeClients = $this->listeClients();
            
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

        // X derniers RDV
        public function derniersRDV() {
                if (isset($_SESSION['idUser'])){
                        $idUser = $_SESSION['idUser'];
                        $sql = "SELECT RV.id, RV.date_debut, RV.date_fin, CONCAT(C.nom, ' ', C.prenom) AS pnom_client, RV.adresse_rdv, RV.commentaire
                                FROM rendezvous RV
                                LEFT JOIN clients C ON RV.id_client = C.id
                                WHERE RV.id_user = $idUser
                                AND RV.id_statut_rdv = 1
                                ORDER BY RV.date_debut ASC
                                LIMIT 4;";
                        $result = $this->db->mysqli->query($sql);

                        return $result;
                }
        }

        // Liste clients
        public function listeClients() {
                $sql = "SELECT *
                        FROM clients";
                $result = $this->db->mysqli->query($sql);
                return $result;
        }
}
?>