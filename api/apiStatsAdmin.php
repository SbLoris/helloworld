<?php
require_once("connectDB.php");

class statsAdmin {
    private $db;
    public $rdvAgentsManager;
    public $statsAgentsManager;

    public function __construct() {
        $this->db = new DatabaseConnection();
        $this->rdvAgentsManager = $this->rdvAgentsManager();
        $this->statsAgentsManager = $this->statsAgentsManager();
    }

    // Nombre de rendez-vous total pour l'agent connecté
    public function rdvAgentsManager() {
            if (isset($_SESSION['id_profil'])){
                if ($_SESSION['id_profil'] == 3) {
                    $team = $_SESSION['team'];
                    $sql = "SELECT RV.date_debut, RV.date_fin, RV.nom_client, RV.adresse_rdv, CONCAT(U.nom, ' ', U.prenom) AS agent
                            FROM rendezvous RV
                            LEFT JOIN users U ON U.id = RV.id_user
                            WHERE team = '$team'
                            AND id_statut_rdv = 1
                            ORDER BY date_debut ASC;";
                    $result = $this->db->mysqli->query($sql);

                    foreach ($result as $data) {
                        return $_SESSION['rdvAgentsManager'] = $data;
                    }
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
                        WHERE team = '$team'
                        AND id_statut_rdv = 2
                        GROUP BY id_user;";
                $result = $this->db->mysqli->query($sql);

                foreach ($result as $data) {
                    return [$_SESSION['statsCountAgentsManager'] = $data['rdvFini'], $_SESSION['statsAgentsManager'] = $data['agent']];
                }
            }
        }
    }
}
?>