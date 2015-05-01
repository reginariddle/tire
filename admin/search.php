<?php
require('../includes/database_connection.php');

if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}

/* 
This is the Administrator search functions page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: search.php
Description: This page is the page used as the search functions page
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/
if (isset($_POST['size'])) {
	$_SESSION['size'] = $_POST['size'];
	$size = $_SESSION['size'];

}


function tiresize() {
	global $db;

	if (isset($_POST['size'])) {
		$_SESSION['size'] = $_POST['size'];
		$size = $_SESSION['size'];
		// $size=mysql_real_escape_string($size);
		// trim($size);
	}


	if (isset($size)) {
		$query = $db->prepare("SELECT size FROM tires WHERE size = '$size'");
		$query->execute();

		$tires = $query->fetchAll();
		if (isset($tires)) {
			echo "<table id='tiresearch'>";
			foreach ($tires as $name) {
				echo "<tr><td>";
				echo "Tire Size is Available: " . $name['size'];
				echo "</td></tr>";
			}
		} else {
			echo "<tr><td>";
			echo "We don't have your size in stock, but we can order it and have it the next day!!!";
			echo "</td></tr></table>";
		}
	}
}

tiresize();


include('home.php');
//var_dump($size);

?>