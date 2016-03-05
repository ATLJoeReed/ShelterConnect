<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 11:16 AM
 */

require(__DIR__ . '.conn.php');



$results = pg_query($conn, "select location.id, name, lat, long, address1, address2, city, state, zip_code, beds_available from location join shelter on location.id=shelter.location_id where beds_available>0;");

$shelters = pg_fetch_all($results);
echo '<pre>';
if (!$shelters) {
    echo "An error occurred.\n";
    exit;
}
else {
    foreach ($shelters as $shelter) {
        json_encode($shelter);
        exit();
    }
}