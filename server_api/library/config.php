<?php
    define('DB_NAME', 'db_crudionic');// DATABASE
    define('DB_USER', 'root'); //ROOT DEFAULT MYSQL
    define('DB_PASSWORD', ''); //PASSOWRD
    define('DB_HOST', 'localhost');  //LOCALHOST
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
   /* class Database{
 
        // specify your own database credentials
        private $host = "localhost";
        private $db_name = "db_crudionic";
        private $username = "root";
        private $password = "";
        public $conn;
     
        // get the database connection
        public function getConnection(){
     
            $this->conn = null;
     
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
     
            return $this->conn;
        }
    }*/

    ?>