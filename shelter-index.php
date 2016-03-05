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

<h1> Shelter Index</h1>

<ul>
    <li>Shelter 1</li>
    <li>Shelter 2</li>
</ul>
</body>


</html>