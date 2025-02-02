<?php

class dbConnect {
    private $conn = null;
    private $host = 'localhost';
    private $dbname = 'database';
    private $username = 'root';
    private $password = '';

    public function connectDB() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //echo "Lidhja u krijua me sukses";
            return $this->conn;
        } catch (PDOException $pdoe) {
            die("Nuk mund te lidhje me bazen e te dhenave {$this->dbname}: " . $pdoe->getMessage());
        }
    }
}
    
?>