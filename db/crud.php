<?php

    class crud {
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        // function to insert a new record into the camera_inventory database
        public function insertRecords($camera_brand, $model, $cam_type, $serial_number, 
        $date_of_arrival, $date_of_issue){

            try {
                //define sql statement to be executed
                $sql = "INSERT INTO camera_inventory (camera_brand_id,
                model_id, type_id,serial_number, date_of_arrival, date_of_issue)
                VALUES (:camera_brand,:model,:cam_type, :serial_number,
                 :date_of_arrival, :date_of_issue)";

                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                //bind all placeholders to the actual values
                $stmt->bindparam(':camera_brand', $camera_brand);
                $stmt->bindparam(':model', $model);
                $stmt->bindparam(':cam_type', $cam_type);
                $stmt->bindparam(':serial_number', $serial_number);
                $stmt->bindparam(':date_of_arrival', $date_of_arrival);
                $stmt->bindparam(':date_of_issue', $date_of_issue);

                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function editCameraDetails($id, $camera_brand, $model, $cam_type, $serial_number, 
        $date_of_arrival, $date_of_issue){

            try{
                $sql = "UPDATE `camera_inventory` SET `camera_brand_id`=:camera_brand,`model_id`=:model,
                `type_id`=:cam_type, `serial_number`=:serial_number,`date_of_arrival`=:date_of_arrival,
                `date_of_issue`=:date_of_issue WHERE camera_inventory_id = :id";
    
    
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
    
                //bind all placeholders to the actual values
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':camera_brand', $camera_brand);
                $stmt->bindparam(':model', $model);
                $stmt->bindparam(':cam_type', $cam_type);
                $stmt->bindparam(':serial_number', $serial_number);
                $stmt->bindparam(':date_of_arrival', $date_of_arrival);
                $stmt->bindparam(':date_of_issue', $date_of_issue);
    
                //execute statement
                $stmt->execute();
                return true;    

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getRecords(){
            try{
                $sql = "SELECT * FROM `camera_inventory` ci 
                inner join camera_brand cb on ci.camera_brand_id = cb.camera_brand_id
                inner join camera_model cm on ci.model_id = cm.model_id
                inner join camera_type ct on ci.type_id = ct.camera_type_id";
                $result = $this->db->query($sql);
                 return $result;    
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

            
        }    

        public function getCameraDetails($id){

            try{

                $sql = "SELECT * FROM `camera_inventory` ci 
                inner join camera_brand cb on ci.camera_brand_id = cb.camera_brand_id
                inner join camera_model cm on ci.model_id = cm.model_id
                inner join camera_type ct on ci.type_id = ct.camera_type_id where camera_inventory_id = :id";
    
                /*
                $sql = "select * from camera_inventory ci 
                inner join camera_brand cb on ci.camera_brand_id = cb.camera_brand_id
                inner join camera_model cm on ci.model_id = cm.model_id
                inner join camera_type ct on ci.type_id = ct.camera_type_id where camera_inventory_id = :id"; */
    
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

           
        }

        public function deleteInventory($id){
            try {
                $sql = "delete from camera_inventory where camera_inventory_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

            
        }

        public function getCamerabrand(){

            try{
                $sql = "SELECT * FROM `camera_brand`";
                $result = $this->db->query($sql);
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }    
           
        } 

        public function getCameramodel(){
            try{
                $sql = "SELECT * FROM `camera_model`";
                $result = $this->db->query($sql);
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } 

        public function getCameratype(){

            try{
                $sql = "SELECT * FROM `camera_type`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } 



    }

?>