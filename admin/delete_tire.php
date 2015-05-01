<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}
/*
This is the Administrator Delete a Tire function page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: delete_tire.php
Description: This page is the page used to delete a tire from the database
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/
$query = 'SELECT * FROM tires';
$tires = $db->query($query);
foreach ($tires as $tire);

				
$delete = $tire['idtires'];

$query = "DELETE FROM tires
			WHERE idtires = $delete";
$db->exec($query);

include('delete.php');
?>