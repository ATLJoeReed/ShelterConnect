<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 11:16 AM
 */



$conn_string = "host=ec2-54-227-248-123.compute-1.amazonaws.com port=5432 dbname=d7ci554olg4igm user=".getenv('DATABASE_USERNAME')." password=". getenv('DATABASE_PASSWORD') . "";
$conn = pg_connect($conn_string);

//$lat=33.76;
//$long=-84.46;

$results = pg_query($conn, "select * from ret_locations_tbl({$lat}, {$long}, 5)");

$shelters = pg_fetch_all($results);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//echo '<pre>';
function getShelters($shelters)
{
    $data = array();
    if (!$shelters) {
        echo "An error occurred.\n";
        exit;
    } else {
        foreach ($shelters as $shelter) {
            $data[] = $shelter;
        }
        $json = json_encode($data, JSON_PRETTY_PRINT);
        echo $json;
    }

    exit();
}
getShelters($shelters);