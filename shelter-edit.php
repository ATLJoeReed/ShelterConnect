<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 12:25 PM
// */
//$id = $_GET['shelterId'];

$conn_string = "host=ec2-54-227-248-123.compute-1.amazonaws.com port=5432 dbname=d7ci554olg4igm user=".getenv('DATABASE_USERNAME')." password=". getenv('DATABASE_PASSWORD') . "";
$conn = pg_connect($conn_string);

$results = pg_query($conn, "select name, beds_total, beds_available, beds_taken, beds_maintainence, phone_number_1, phone_number_2, phone_number_3, address1, address2, zip_code, lat, long from shelter join location on location.id=location_id where shelter.id=1;" );

$shelters = pg_fetch_all($results);

?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">

<form action="/api/functions.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Shelter Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $shelters[0]['name'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds Total</label>
        <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_total'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds Available</label>
        <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_available'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds in Maintenance</label>
        <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_maintainence'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone 1</label>
        <input type="tel" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['phone_number_1'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone 2</label>
        <input type="tel" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['phone_number_2'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone 3</label>
        <input type="tel" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['phone_number_3'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['name'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>
    <input type="hidden" value="<?php echo $id;?>">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
    </div>



</form>

</body>


</html>