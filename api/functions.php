<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 3/5/16
 * Time: 1:21 PM
 */


$shelterName =$_REQUEST['shelter_name'];
$bedsTotal =$_REQUEST['beds_total'];
$bedsAvailable =$_REQUEST['beds_available'];
$bedsInMaintance =$_REQUEST['beds_in_maintainence'];
$phone1 =$_REQUEST['phone1'];
$phone2 =$_REQUEST['phone2'];
$phone3 =$_REQUEST['phone3'];
$address1 =$_REQUEST['address1'];
$address2 =$_REQUEST['address2'];
$zipCode =$_REQUEST['zip_code'];
$lat =$_REQUEST['lat'];
$long =$_REQUEST['long'];







header('Location: https://infinite-brook-58503.herokuapp.com/shelter-edit.php');