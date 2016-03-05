<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 9:42 AM
 */


$conn_string = "host=ec2-54-227-248-123.compute-1.amazonaws.com port=5432 dbname=d7ci554olg4igm user=sgihmeyddphdwo password= 7H5KEn9R9_OKLEw8_Rom-w0Aje";
$conn = pg_connect($conn_string);

print_r($dbconn4);



$result = pg_query($conn, "SELECT * FROM shelter");
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
else {
    print_r($result);
}