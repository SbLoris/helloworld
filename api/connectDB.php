<?php

class DatabaseConnection {
    // Connexion BDD
   private $dbhost;
   private $dbuser;
   private $dbpass;
   private $dbname;
   public $mysqli;
   public $connect;

   public function __construct ($dbhost = 'localhost', $dbuser = 'root', $dbpass = 'root', $dbname = 'julesimmobilier') {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
        $this->mysqli = $this->connectionDB();
        $this->connect = $this->connect();
    }

    public function connectionDB () {
        $mysqli = new mysqli(
            $this->dbhost,
            $this->dbuser,
            $this->dbpass,
            $this->dbname
        );
        if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
        }
        return $mysqli;
    }

    public function connect() {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = $_REQUEST["mail"];
            $password = $_REQUEST["mdp"];

            $sql = $this->mysqli->prepare("SELECT id_profil 
                    FROM users 
                    WHERE mail=? 
                    AND mdp=MD5(?)");

            $sql->bind_param("ss", $username, $password);
            $sql->execute();

            $result = $sql->get_result();

            if (mysqli_num_rows($result) == 1) {
                // Login et mot de passe corrects
                // On connecte l'utilisateur
                header("Location: Zaccueil.php"); // Redirection vers la page de connexion réussie
                return $result;
            } else {
                // Login ou mot de passe incorrects
                echo "Login ou mot de passe incorrects.";
                $result = false;
            }
        }
    }
}

?>