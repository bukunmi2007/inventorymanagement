<?php
     require_once 'db/conn.php'; 

    //Get values from post operation

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['id'];
        $camera_brand = $_POST['camerabrand'];
        $model = $_POST['modelnumber'];
        $cam_type = $_POST['type'];
        $serial_number = $_POST['serialnumber'];
        $date_of_arrival = $_POST['dateofarrival'];
        $date_of_issue = $_POST['dateofissue'];

        // Call CRUD function
        $result = $crud->editCameraDetails($id, $camera_brand, $model, $cam_type, $serial_number, 
        $date_of_arrival, $date_of_issue);

        //Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            echo 'error';
        }
    }
    else{
            echo 'error';
    }


?>