<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');}
require('../includes/database_connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* 
This is the Administrator Save Invoices functions page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: saveinvoices.php
Description: This page is the page used as the save invoices functions page
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/


$idinvoices = '';
$idmembers = '';
$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
$idtires = $_POST["idtires"];
$quantity = $_POST["quantity"];
$paid = $_POST["paid"];
$date = $_POST["date"];

function get_member_id($lastname, $firstname) {
  global $db;
$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
    $query = $db->prepare("SELECT idmembers FROM members WHERE last = '$lastname' AND first = '$firstname'");
    $query->execute();

    $idmembers = $query->fetch()['idmembers'];
    return $idmembers;
}

//var_dump($idmembers);
//$deptnum = $result->fetch()['dept'];

function add_invoice($idinvoices, $idmembers, $date, $idtires, $quantity, $paid) {
	global $db;
$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
$idmembers = get_member_id($lastname, $firstname);
//var_dump($idmembers);
//print_r ($idmembers);
	$query = "INSERT INTO invoices
                 (idinvoices, idmembers,  date, idtires, quantity, paid)
              VALUES
                 ('$idinvoices', '$idmembers',  '$date', '$idtires', '$quantity', '$paid')";
	
	// var_dump($db);
	$db->exec($query);
//var_dump($query);
}

function print_invoice($date, $idinvoices, $firstname, $lastname, $idmembers, $idtires, $quantity, $paid){
  echo '<p id="date">Date:'.$date. '</p><br />';
  echo '<p id="invoices2">'.$idinvoices. '</p><br />';
  echo '<p id="firstlastname">Name: '.$firstname.' '.$lastname. '</p><br />';
  echo '<p id="idmembers"> '.$idmembers. '</p><br />';
  echo '<p id="idtires">Tire ID:'.$idtires. '</p><br />';
  echo '<p id="quantity">Quantity: '.$quantity. '</p><br />';
  echo '<p id="paid">Amount Paid: '.$paid. '</p><br />';
}
add_invoice($idinvoices, $idmembers, $date, $idtires, $quantity, $paid);
//print_invoice($date, $idinvoices, $firstname, $lastname, $idmembers, $idtires, $quantity, $paid);


include('invoices.php');

?>