<?php
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
require('includes/database_connection.php');
// Include functions
require_once('includes/functions.php');
/*
This is the regular user index page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: index.php
Description: This page is the page used as the index page for regular users
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/
$loginName = isset($_REQUEST['loginName']) ? $_REQUEST['loginName'] : "";
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : 'default';

switch ($action) {
	case 'login':
		if (!empty($loginName) && !empty($password)) {
			login($loginName, $password);
		} else {
			header('Location: home.php?err=1');
		}
		break;
	case 'logout':
		logout();
		header('Location: home.php');
		break;
	case 'search':
		tiresize();
		echo "is this case statement being executed";
		header('Location: ../member/home.php');
		break;
	case 'default':
		header('Location: home.php');
		break;

}

include('home.php');
/*
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
require('includes/database_connection.php');
// Include functions
require_once('includes/functions.php');


//include 'includes/loginform.inc.html';
$get_params = allowed_get_params(['loginName', 'password']);
//print_r($_POST);
//var_dump($_POST);
// $loginName = $_POST['loginName'];
// $password = $_POST['pwd'];
if ($get_params && (isset($_SESSION['loginName']) === false)) {
	$_SESSION['loginName'] = $_POST['loginName'];
	$_SESSION['password'] = $_POST['password'];
}
//$loginName = $_SESSION['loginName'];


//var_dump($get_params);

/*

if ($get_params && (isset($_SESSION['loginName'])=== false) && (isset($_SESSION['password'])=== false)){
  $_SESSION['loginName'] = $_POST['loginName'];
  $_SESSION['password'] = $_POST['password'];
  $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
} 
//$loginName = $_SESSION['loginName'];
*/


//var_dump($get_params);

// Get the action to perform
/*
if (isset($_POST['action'])) {
	$action = $_POST['action'];
	//  require_once 'includes/loginform.inc.html';
	// echo 'Hello World';
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
	//  require_once 'includes/loginform.inc.html';
	// echo 'Hello World!!!!';
} else if ((isset($_SESSION['loginName'])) && (isset($_SESSION['password']))) {
	$action = 'login';
	echo 'This is the login';
*/
	//require_once 'includes/logouform.inc.html';
	//require_once 'index.htm';
	//echo 'Hello ' . htmlspecialchars($_POST["loginName"]) . '!';
	//var_dump($loginName);
	//var_dump($passwords);
/*} else {
	$action = 'default';*/
	//echo 'Hello World!!!';
	// $loginName = $_SESSION['loginName'];
	//  require_once 'includes/loginform.inc.html';
/*}

switch ($action) {

	case 'login':
		if ((isset($_SESSION['loginName'])) && (isset($_SESSION['password']))) {
			connect(($_SESSION['loginName']) && ($_SESSION['password']));
			$loginName = $_SESSION['loginName'];
			$password = $_SESSION["password"];
			//if(isset($_POST['loginName'])) {
			// $loginName = $_SESSION['loginName'];
			// $loginName = login($loginName);
			login($loginName, $password);
			//admin($level);
//include('includes/logoutform.inc.html');

		} else {
			$loginName = $_SESSION['loginName'];
			$loginName = login($loginName);
//include('includes/logoutform.inc.html');
		}
		//
		break;
	case 'logout':
		//var_dump($_POST);
		logout();
	include('home.php');
		break;
	case 'default':
		//include('includes/loginform.inc.html');
		break;
}


include('home.php');

*/
?>