<?php

class DatabaseConnection {
    // Connexion BDD
   private $dbhost;
   private $dbuser;
   private $dbpass;
   private $dbname;
   public $mysqli;
   public $connect;

   public function __construct ($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'julesimmobilier') {
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

            $sql = "SELECT * FROM users WHERE mail='$username' AND mdp=MD5('$password')";
        
            $result = $this->mysqli->query($sql);

            if (mysqli_num_rows($result) == 1) {
                // Login et mot de passe corrects
                header("Location: dashboard.php"); // Redirection vers la page de connexion réussie
              } else {
                // Login ou mot de passe incorrects
                echo "Login ou mot de passe incorrects.";
              }
        }
    }
}

?>