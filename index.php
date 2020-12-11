<?php
    $title = 'Index';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    $brands = $crud->getCamerabrand(); 
    $models = $crud->getCameramodel(); 
    $types = $crud->getCameratype(); 

?>

    <h1 class="text-center">Enter Camera Information</h1>

    <form method="post" action="success.php">

        <div class="form-group">
            <label for="modelnumber">Brand</label>
            <select class="form-control" id="camerabrand" name="camerabrand">
                
                <?php while($r = $brands->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['camera_brand_id']?>"> <?php echo $r['camera_brand_type'] ?> </option>
                <?php } ?>     

            </select>
        </div> 

        <div class="form-group">
            <label for="modelnumber">Model</label>
            <select class="form-control" id="modelnumber" name="modelnumber">
                
                <?php while($r = $models->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['model_id']?>"> <?php echo $r['model_name'] ?> </option>
                <?php } ?>     

            </select>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type">

                <?php while($r = $types->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['camera_type_id']?>"> <?php echo $r['camera_type_name'] ?> </option>
                <?php } ?>

            </select>
        </div>

        <div class="form-group">
            <label for="serialnumber">Serial Number</label>
            <input required type="text" class="form-control" id="serialnumber" name="serialnumber">
        </div>

        <div class="form-group">
            <label for="dateofarrival">Date of Arrival</label>
            <input required type="text" class="form-control" id="dateofarrival" name="dateofarrival">
        </div>

        <div class="form-group">
            <label for="dateofissue">Date of Issue</label>
            <input required type="text" class="form-control" id="dateofissue" name="dateofissue">
        </div>

        <br>

        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';  ?>