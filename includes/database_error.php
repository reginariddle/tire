<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- 
This is the database error page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: database_error.php
Description: This page is the page used to tell users they have an error connecting to the database
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<!-- the head section -->
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<!-- the body section -->
<body>
<div id="page">
	<div id="header">
		<h1>Login Form</h1>
	</div>

	<div id="main">
		<h1>Database Error</h1>

		<p>There was an error connecting to the database.</p>

		<p>Error message: <?php echo $error_message; ?></p>

		<p>&nbsp;</p>
	</div>
	<!-- end main -->

	<div id="footer">
		<p class="copyright">
			&copy; <?php echo date("Y"); ?> &copy;2014 by Regina Riddle
		</p>
	</div>

</div>
<!-- end page -->
</body>
</html>