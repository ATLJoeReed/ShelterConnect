<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 12:25 PM
 */
$id = $_GET['shelterId'];

$conn_string = "host=ec2-54-227-248-123.compute-1.amazonaws.com port=5432 dbname=d7ci554olg4igm user=".getenv('DATABASE_USERNAME')." password=". getenv('DATABASE_PASSWORD') . "";
$conn = pg_connect($conn_string);

$results = pg_query($conn, "select name, beds_total, beds_available, beds_taken, beds_maintenance, phone_number_1, phone_number_2, phone_number_3, address1, address2, zip_code, lat, long from shelter join location on location.id=location_id where shelter.id=1;" );

$shelters = pg_fetch_all($results);

print_r($shelters);
die();



?>
<!DOCTYPE html>

<head>

</head>
<body>

<form action="/api/functions.php" method="POST">
    <label>Shelter Name</label>
    <input name="client_name" type="text" value="<?php echo $_GET['shelterName'];?>">
    <input type="hidden" value="<?php echo $id;?>">
    <input name="client" type="submit" value="Add">



</form>

</body>


</html>