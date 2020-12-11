<?php
    $title = 'Edit Record';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    $brands = $crud->getCamerabrand(); 
    $models = $crud->getCameramodel(); 
    $types = $crud->getCameratype(); 

    if(!isset($_GET['id'])){
       // echo 'error';
       include 'includes/errormessage.php';
       header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $inventory = $crud->getCameraDetails($id);
    

?>

    <h1 class="text-center">Edit Camera Information</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $inventory['camera_inventory_id'] ?>" />

        <div class="form-group">
            <label for="modelnumber">Brand</label>
            <select class="form-control" id="camerabrand" name="camerabrand">
                
                <?php while($r = $brands->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['camera_brand_id']?>" 
                        <?php if($r['camera_brand_id'] == $inventory['camera_brand_id']) echo 'selected' ?>>
                        <?php echo $r['camera_brand_type'] ?> 
                    </option>
                <?php } ?>     

            </select>
        </div> 

        <div class="form-group">
            <label for="modelnumber">Model</label>
            <select class="form-control" id="modelnumber" name="modelnumber">
                
                <?php while($r = $models->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['model_id']?>"
                        <?php if($r['model_name'] == $inventory['model_name']) echo 'selected' ?>> 
                        <?php echo $r['model_name'] ?>                     
                    </option>
                <?php } ?>     

            </select>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type">

                <?php while($r = $types->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['camera_type_id']?>"
                        <?php if($r['camera_type_id'] == $inventory['camera_type_id']) echo 'selected' ?>> 
                        <?php echo $r['camera_type_name'] ?> 
                    </option>
                <?php } ?>

            </select>
        </div>

        <div class="form-group">
            <label for="serialnumber">Serial Number</label>
            <input type="text" class="form-control" value="<?php echo $inventory['serial_number'] ?>" id="serialnumber" name="serialnumber">
        </div>

        <div class="form-group">
            <label for="dateofarrival">Date of Arrival</label>
            <input type="text" class="form-control" value="<?php echo $inventory['date_of_arrival'] ?>" id="dateofarrival" name="dateofarrival">
        </div>

        <div class="form-group">
            <label for="dateofissue">Date of Issue</label>
            <input type="text" class="form-control" value="<?php echo $inventory['date_of_issue'] ?>" id="dateofissue" name="dateofissue">
        </div>

        <br>

        <a href="viewrecords.php"  class="btn btn-default">Back to List</button>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>

<?php  } ?>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';  ?>