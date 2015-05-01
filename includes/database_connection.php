<?php

/* 
This is the database connection page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: database_connection.php
Description: This page used to connect to the database
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/

	if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
		// login locally
		$dsn = 'mysql:host=localhost;dbname=regina_tires';
		$username = 'root';
		$password = '';

	} else {
		// login online
		$dsn = 'mysql:host=localhost;dbname=regina_tires';
		$username = 'regina_me';
		$password = '13777';

	}

	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		include('database_error.php');
		exit();

	}
?>