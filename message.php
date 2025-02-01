<?php
    class Message{
        private $conn;

        public function __construct($dbConnection){
            $this->conn=$dbConnection;
        }
        public function registerMsg($email, $user_message, $time){
          try{
                $sql="INSERT INTO messages (email, message, created_at) values(:email, :message, :time)";
                $stmt=$this->conn->prepare($sql);

                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':message',$user_message);
                $stmt->bindParam(':time',$time);

                $stmt->execute();
                return "Message has been sent successfully";
            }catch(PDOException $pdoe){
                return "Error: " . $pdoe->getMessage();
        }
    }
}
?>