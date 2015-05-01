<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('includes/functions.php');
}
?>

<!DOCTYPE html>
<html>
<!--
This is the regular user history page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: history.php
Description: This page is the page used as the history page for regular users
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
						<legend>Login</legend>
						<div style="color:red;"><?php echo isset($_REQUEST['err']) && $_REQUEST['err'] == 1 ? "Invalid Password" : "";?></div>
						
					
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
					<li class="home"><a href="home.php">Home</a></li>
					<li id="homeLink"><a id="history" href="history.php">History</a></li>
					<li class="home"><a href="services.php">Services</a></li>
					<li class="home"><a href="model.php">Model</a></li>
					<li class="home"><a href="registration.php">Register</a></li>

				</ul>
			</div>
			</div>
				<div id="main">
				
				
					<article>
					<p>
						Steve & Angie’s Tire Service has been selling new and used tires for over 30 years to local
						businesses and consumers. We enjoy participating in our community with our business and give the
						best service plans available for our tires. We sell a variety of new and used tires including
						Michelin, Good Year, Cooper and many more that we usually have in stock. If we don’t have a tire
						in stock we can order the tire you are looking for and have it, typically by the next day. We
						are in a convenient location just outside of Burnsville across from Burnsville Elementary School
						and we will be happy to do business with you. If you are looking for excellent customer service
						with an excellent tire, please take time to visit our Burnsville shop. There is no need to call
						for an appointment. We provide fast and convenient service with your visit. Please call
						828-682-7200 for any questions and register here to look up your tires and find out if we have
						them in stock.
					</p>
					</article>
			
						
				
					
					
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
	
</div>
	<div id="hammer"></div>
</div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->



