<?php
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
require('../includes/database_connection.php');
// Include functions
require_once('../includes/functions.php');
/*
This is the Member Index page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: index.php
Description: This page is the page used as the index page for members
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
		header('Location: ../home.php');
		break;
	case 'search':
		tiresize();
		echo "is this case statement being executed";
		header('Location: ../member/home.php');
		break;
	case 'default':
		header('Location: ../home.php');
		break;

	
}

include('home.php');