<?php
/*
This is the Administrator Add A Tire function page 
Author: Regina Hill
Revision Date: 4/8/2015
File Name: addatire.php
Description: This page is the page used to create the function for adding a tire to the database
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/
require('../includes/database_connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$idtires = '';
$size = $_POST["size"];
$price = $_POST["price"];
$mileage = $_POST["mileage"];
$idterrain = $_POST["idterrain"];
$idvehicle = $_POST["idvehicle"];
$idtiremodel = $_POST["idtiremodel"];

function add_tire( $size,   $price, $mileage, $idterrain, $idvehicle, $idtiremodel) {
    global $db;
    $query = "INSERT INTO tires
                 (`size`,  `price`, `mileage`, `idterrain`, `idvehicle`, `idtiremodel`)
              VALUES
                 ('$size',  '$price', '$mileage','$idterrain', '$idvehicle', '$idtiremodel')";
  // var_dump($query);
   // var_dump($db); 
    $db->exec($query);
  // var_dump($db);
//echo "\nPDO::errorCode(): ";
//print $db->errorCode();

}

   
  add_tire( $size,  $price, $mileage, $idterrain, $idvehicle, $idtiremodel);
 

 
include('add.php');





?>