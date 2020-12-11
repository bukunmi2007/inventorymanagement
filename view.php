<?php
    $title = 'View Record';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    //Get camera detail

    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'> please check details and try again </h1>";

    }else{
        $id = $_GET['id'];
        $result = $crud->getCameraDetails($id);        
    

?>

    <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Camera Information</h5>
            </div>
            
            <ul class="list-group list-group-flush">
            <li class="list-group-item"> Brand:  <?php echo $result['camera_brand_type'] ?> </li>
            <li class="list-group-item"> Model: <?php echo $result['model_name'] ?> </li>
            <li class="list-group-item"> Type: <?php echo $result['camera_type_name'] ?> </li>
            <li class="list-group-item"> Serial Number: <?php echo $result['serial_number'] ?> </li>
            <li class="list-group-item"> Date of Arrival: <?php echo $result['date_of_arrival'] ?> </li>
            <li class="list-group-item">Date of Issue: <?php echo $result['date_of_issue'] ?> </li>
            </ul>
    
    </div>
    <br/>    
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['camera_inventory_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');" 
        href="delete.php?id=<?php echo $result['camera_inventory_id'] ?>" class="btn btn-danger">Delete</a>

    <?php } ?>

<br>
<br>
<br>
<?php require_once 'includes/footer.php';  ?>