<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 12:25 PM
// */
$id = $_GET['shelterId'];

$conn_string = "host=ec2-54-227-248-123.compute-1.amazonaws.com port=5432 dbname=d7ci554olg4igm user=".getenv('DATABASE_USERNAME')." password=". getenv('DATABASE_PASSWORD') . "";
$conn = pg_connect($conn_string);

$results = pg_query($conn, "select name, beds_total, beds_available, beds_taken, beds_maintainence, phone_number_1, phone_number_2, phone_number_3, address1, address2, city, state, zip_code, lat, long from shelter join location on location.id=location_id where shelter.id=".$id );

$shelters = pg_fetch_all($results);


?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container col-md-8" style="margin: 40px auto 0;">

<form action="/api/functions.php" method="POST">
    <h2>Shelter Edit Form</h2>
    <div class="form-group">
        <label for="exampleInputEmail1">Shelter Name</label>
        <input type="text" name="shelter_name" class="form-control" id="exampleInputEmail1" value="<?php echo $shelters[0]['name'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds Total</label>
        <input type="number" name="beds_total" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_total'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds Available</label>
        <input type="number" name="beds_available" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_available'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds Taken</label>
        <input type="number" name="beds_taken" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_available'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Beds in Maintenance</label>
        <input type="number" name="beds_in_maintainence" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['beds_maintainence'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone 1</label>
        <input type="tel" name="phone1" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['phone_number_1'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone 2</label>
        <input type="tel" name="phone2" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['phone_number_2'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone 3</label>
        <input type="tel" name="phone3" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['phone_number_3'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address 1</label>
        <input type="text" name="address1" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['address1'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address 2</label>
        <input type="text" name="address2" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['address2'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">City</label>
        <input type="text" name="city" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['city'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">State</label>
        <input type="text" name="state" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['state'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Zip Code</label>
        <input type="text" name="zip_code" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['zip_code'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Latitude</label>
        <input type="text" name="lat" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['lat'];?>" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Longitude</label>
        <input type="text" name="long" class="form-control" id="exampleInputPassword1" value="<?php echo $shelters[0]['long'];?>" readonly>
    </div>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
    </div>



</form>

</body>


</html>