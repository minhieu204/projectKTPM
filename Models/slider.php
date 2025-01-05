<?php
    class slider{
        private $conn;
        public $image;
        public $id;
    
            public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT * FROM slider_images";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }

        public function getone(){
            $sql = "SELECT * FROM slider_images WHERE id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->id);
            $stmt->execute(); 
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->image = $row['image'];
                return true; 
            } else {
                return false;
            }
        }

        public function post(){
            $sql = "INSERT INTO slider_images SET image=:image";
            $stmt = $this->conn->prepare($sql);
           
            $this->image = htmlspecialchars(strip_tags($this->image));
          
            
            $stmt->bindParam(':image',$this->image);
          
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function put(){
            $sql = "UPDATE slider_images SET image=:image WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':image',$this->image);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function delete(){
            $sql = "DELETE FROM slider_images WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id',$this->id);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function exists() {
            $sql = "SELECT COUNT(*) FROM slider_images WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetchColumn();
            
            return $row > 0;  
        }        
    }   
?>