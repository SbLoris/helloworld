<?php
require_once("connectDB.php");

class statsAdmin {
    private $db;
    public $rdvAgentsManager;
    public $statsAgentsManager;
    public $rdvAllAgents;
    public $countClients;
    public $allRDV;
    public $allRDV7Days;
    public $rankingAgents;

    public function __construct() {
        $this->db = new DatabaseConnection();
        $this->rdvAgentsManager = $this->rdvAgentsManager();
        $this->statsAgentsManager = $this->statsAgentsManager();
        $this->rdvAllAgents = $this->rdvAllAgents();
        $this->countClients = $this->countClients();
        $this->allRDV = $this->allRDV();
        $this->allRDV7Days = $this->allRDV7Days();
        $this->rankingAgents = $this->rankingAgents();
    }

    public function rdvAgentsManager() {
            if (isset($_SESSION['id_profil'])){
                if ($_SESSION['id_profil'] == 3) {
                    $team = $_SESSION['team'];
                    $sql = "SELECT RV.id, RV.date_debut, RV.date_fin, RV.commentaire, CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.adresse_rdv, CONCAT(U.nom, ' ', U.prenom) AS agent
                            FROM rendezvous RV
                            LEFT JOIN users U ON U.id = RV.id_user
                            LEFT JOIN clients C ON C.id = RV.id_client
                            WHERE team = '$team'
                            AND id_statut_rdv = 1
                            ORDER BY date_debut ASC;";
                    $result = $this->db->mysqli->query($sql);

                    return $result;
                }
            }
    }

    public function statsAgentsManager() {
        if (isset($_SESSION['id_profil'])){
            if ($_SESSION['id_profil'] == 3) {
                $team = $_SESSION['team'];
                $sql = "SELECT COUNT(*) AS rdvFini, CONCAT(U.nom, ' ', U.prenom) AS agent
                        FROM rendezvous RV
                        LEFT JOIN users U ON U.id = RV.id_user
                        WHERE U.team = '$team'
                        AND id_statut_rdv = 2
                        GROUP BY id_user;";
                $result = $this->db->mysqli->query($sql);

                foreach ($result as $data) {
                    return ['rdvFini'=>$data['rdvFini'], 'agent'=>$data['agent']];
                }
            }
        }
    }

    public function rdvAllAgents() {
        if (isset($_SESSION['id_profil'])){
            if ($_SESSION['id_profil'] == 2 || $_SESSION['id_profil'] == 5) {
                $sql = "SELECT RV.id, RV.date_debut, RV.date_fin, CONCAT(C.nom, ' ', C.prenom) as pnom_client, RV.adresse_rdv, RV.commentaire, CONCAT(U.nom, ' ', U.prenom) AS agent, U.team
                        FROM rendezvous RV
                        LEFT JOIN users U ON U.id = RV.id_user
                        LEFT JOIN clients C ON C.id = RV.id_client
                        WHERE id_statut_rdv = 1
                        ORDER BY date_debut ASC;";

                $result = $this->db->mysqli->query($sql);

                return $result;
                
            }
        }
    }

    public function countClients() {
        if (isset($_SESSION['id_profil'])){
            if ($_SESSION['id_profil'] == 1) {
            $sql = "SELECT COUNT(*) AS nbr_clients
                    FROM clients;";

                $result = $this->db->mysqli->query($sql);

                foreach ($result as $data) {
                    return ['nbr_clients'=>$data['nbr_clients']];
                }
            }
        }
    }

    public function allRDV() {
        if (isset($_SESSION['id_profil'])){
            if ($_SESSION['id_profil'] == 1) {
            $sql = "SELECT COUNT(*) as allRDV
                    FROM rendezvous;";

                $result = $this->db->mysqli->query($sql);

                foreach ($result as $data) {
                    return $data;
                }
            }
        }
    }

    public function allRDV7Days() {
        if (isset($_SESSION['id_profil'])){
            if ($_SESSION['id_profil'] == 1) {
            $sql = "SELECT COUNT(*) as allRDV7Days
                    FROM rendezvous
                    WHERE date_fin > DATE_SUB(NOW(), INTERVAL -7 DAY);";

                $result = $this->db->mysqli->query($sql);

                foreach ($result as $data) {
                    return $data;
                }
            }
        }
    }

    public function rankingAgents() {
        if (isset($_SESSION['id_profil'])){
            if ($_SESSION['id_profil'] == 1) {
            $sql = "SELECT COUNT(*) AS rdvFini, CONCAT (nom, ' ', prenom) AS agent
                    FROM rendezvous RV
                    LEFT JOIN users U ON RV.id_user = U.id
                    WHERE RV.id_statut_rdv = 2
                    GROUP BY RV.id_user;";

                $result = $this->db->mysqli->query($sql);

                $rdvFini = [];
                $agent = [];
                foreach ($result as $data) {
                    $rdvFini[] = $data['rdvFini'];
                    $agent[] = $data ['agent'];
                }
                return ['rdvFini'=>$rdvFini, 'agent'=>$agent];
            }
        }
    }
}
?>