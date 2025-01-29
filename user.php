<?php
    class User{
        private $conn;

        public function __construct($dbConnection){
            $this->conn = $dbConnection;
        }
        public function ifUserExists($email){
            try{
                $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                return $count>0;
            }catch(PDOException $pdoe){
                die("Error checking user existence: " . $pdoe->getMessage());
            }
        }
        public function register($username, $email, $password){
            
            try{
                if($this->ifUserExists($email)){
                return "User with this email already exists!";
                }
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT INTO   users (username, email, password) values(:username, :email, :password)";
                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(':username',$username);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':password',$hashedPassword);
                
                $stmt->execute();
                return "User registered successfully";
            }catch(PDOException $pdoe){
                return "Error: " . $pdoe->getMessage();
            }
        }
    }
?>