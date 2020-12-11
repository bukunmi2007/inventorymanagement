<?php
    $title = 'Success';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $camera_brand = $_POST['camerabrand'];
      $model = $_POST['modelnumber'];
      $cam_type = $_POST['type'];
      $serial_number = $_POST['serialnumber'];
      $date_of_arrival = $_POST['dateofarrival'];
      $date_of_issue = $_POST['dateofissue'];

      //Call function to insert and track if success or not
      $isSuccess = $crud->insertRecords($camera_brand, $model, $cam_type, $serial_number, 
      $date_of_arrival, $date_of_issue);

        
      if($isSuccess){
        include 'includes/successmessage.php';
      }
        else{
          include 'includes/errormessage.php';
        }


    }

?>


<!--This prints out values that were passed to the action page using method="get"-->

<!--
<div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">Camera Information</h5>
  </div>
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> Brand:  <?php echo $_GET['camerabrand'] ?> </li>
    <li class="list-group-item"> Model: <?php echo $_GET['modelnumber'] ?> </li>
    <li class="list-group-item"> Type: <?php echo $_GET['type'] ?> </li>
    <li class="list-group-item"> Serial Number: <?php echo $_GET['serialnumber'] ?> </li>
    <li class="list-group-item"> Date of Arrival: <?php echo $_GET['dateofarrival'] ?> </li>
    <li class="list-group-item">Date of Issue: <?php echo $_GET['dateofissue'] ?> </li>
  </ul>

</div>
-->


<div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">Camera Information</h5>
  </div>
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> Brand:  <?php echo $_POST['camerabrand'] ?> </li>
    <li class="list-group-item"> Model: <?php echo $_POST['modelnumber'] ?> </li>
    <li class="list-group-item"> Type: <?php echo $_POST['type'] ?> </li>
    <li class="list-group-item"> Serial Number: <?php echo $_POST['serialnumber'] ?> </li>
    <li class="list-group-item"> Date of Arrival: <?php echo $_POST['dateofarrival'] ?> </li>
    <li class="list-group-item">Date of Issue: <?php echo $_POST['dateofissue'] ?> </li>
  </ul>

</div>



<?php

   /* echo $_GET['camerabrand'];
    echo $_GET['modelnumber'];
    echo $_GET['type'];
    echo $_GET['serialnumber'];
    echo $_GET['dateofarrival'];
    echo $_GET['dateofissue'];  */
    
?>



<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';  ?>