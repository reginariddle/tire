<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('includes/functions.php');
}
?>
<!--
This is the regular user search page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: search.php
Description: This page is the page used as the search page for regular users
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Steve & Angie's Tire Service</title>
	<link rel="stylesheet" href="css/web289.css" type="text/css"/>
<script src="js/lib/jquery.js"></script>
	<script src="js/dist/jquery.validate.js"></script>
	<script>
	$(function() {

		
		$("#login").validate({

rules: {
loginName: {required: true,
                email: true, minlength: 5 },
password: { required: true,
minlength: 3 }
},
});

	});
	</script>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">

<link href="css/ie.css" rel="stylesheet" type="text/css" />


</head>

<body>

<div id="wrapper">
	<div id="logo">

		<p>Steve & Angie's Tire Service<br/> 57 Tire Shoppie Drive <br/> Burnsville, NC 28714 <br/>(828) 682-7200</p>

		<div id="content">

			<p>&nbsp;</p>

			<p>&nbsp;</p>
			<div id="member_login" class="loginForm">
			<?php if(!isset($_SESSION['level']) || $_SESSION['level'] != 'Administrator') :?>
				<form action="index.php?action=login" method="post" id="login">
					<fieldset>

						<div style="color:red;"><?php echo isset($_REQUEST['err']) && $_REQUEST['err'] == 1 ? "Invalid Password" : "";?></div>
						<legend>Login</legend>
					
						<label for="loginName" class="required">Username:</label>
						<input id="loginName" name="loginName" placeholder="regina@tires.com" type="text"
						       value="" required />
				
				
						<label for="password" class="required">Password:</label>
						<input id="password" name="password" placeholder="regina" type="password"
						       value="" required />
						    
						<input id="submit" class="submit" type="submit" value="login"/>
					</fieldset>
				</form>
			</div>



			<?php else :?>
				<div id="member_logout">
				<form action="index.php" method="post" id="logoutform.php">

					<fieldset>
						<legend>Logout</legend>

						<?php
						echo "Welcome, ";
							echo $_SESSION['level']. ", ";
							echo $_SESSION['loginName'];
							//echo get_name($results); 
						?>  <br /> <br/> <br/> <br/>
						<input class="submit" id="logout" type="submit" name="action" value="logout"/>

					</fieldset>
				</form>
			</div>
			<?php endif;?>
			<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'Administrator') :?>
				<?php else :?>
			<div id="nav">
				<ul>
					<li id="homeLink"><a id="menu-home" href="home.php">Home</a></li>
					<li class="home"><a href="history.php">History</a></li>
					<li class="home"><a href="services.php">Services</a></li>
					<li class="home"><a href="model.php">Model</a></li>
					<li class="home"><a href="registration.php">Register</a></li>

				</ul>
			</div>
			</div>
				<div id="main">
				
				 <form action="search.php" method="post">
					<p>
						<label for="searchSize" class="search" id="searchSize">Search Size:</label>
					</p>
					<p>
						<input id="search" type="text" name="size" id="size"
						value="<?php echo(isset($size['size'])); ?>"/><br/><br/><br/>
						<input type="submit" value="search"/>
					</p>
				</form>
						
				<?php echo tiresize(); ?>	
					
					
				</div>
			
			<?php endif;?>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>


			<div id="footer">

				<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
	

	<div id="hammer"></div>
</div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->

<?php
require('includes/database_connection.php');

/*$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();*/
//require_once('includes/functions.php');

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
			echo "<ul>";
			foreach ($tires as $name) {
				echo "<li id='tiresearch'>";
				echo "Tire Size is Available: " . $name['size'];
				echo "</li>";
			}
		} else {
			
			echo "</ul>";
		}
	}
}

//tiresize();
//include('home.php');
//header('Location: home.php');

//var_dump($size);

?>