<?php

class DatabaseConnection {
    // Connexion BDD
   private $dbhost;
   private $dbuser;
   private $dbpass;
   private $dbname;
   public $mysqli;

<<<<<<< HEAD
   public function __construct ($dbhost = 'localhost', $dbuser = 'id20423313_loris', $dbpass = '}is8Vx(gFH\ib+9o', $dbname = 'id20423313_julesimmobilier') {
=======
   public function __construct ($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'julesimmobilier') {
>>>>>>> 22ac4adb312a81e65b29e019327abc148e2cc00e
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
        $this->mysqli = $this->connectionDB();
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

}

?>