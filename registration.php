<?php
require_once 'securimage/securimage.php';
  
?>

<!--
This is the regular user registration form page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: registration.php
Description: This page is the page used as the registration page for regular users
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Steve & Angie's Tires Registration</title>
	<link rel="stylesheet" href="css/web289.css" type="text/css"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="css/ie.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
	<div id="logo">
		<p>Steve & Angie's Tire Service<br/> 57 Tire Shoppie Drive <br/> Burnsville, NC 28714 <br/>(828) 682-7200</p>

		<div id="nav">
			<ul>
				<li class="home"><a href="home.php">Home</a></li>
				<li class="home"><a href="history.php">History</a></li>
				<li class="home"><a href="services.php">Services</a></li>
				<li class="home"><a href="model.php">Model</a></li>
				<li id="homePage"><a id="registration" href="registration.php">Register</a></li>

			</ul>
		</div>
	</div>
	<p>&nbsp;</p>

	<p>&nbsp;</p>


	<div id="content">
		

			<form method='post' action='register.php' name='contactform' id='contactform'>
			<div>
        
    </div>
<table>
				<tr>
					<td>
						<p>
							<label for="firstname">First Name:</label><br/>
							
						</p>
					</td>
					<td>
						<p>
							<input type='text' name='firstname' required placeholder="Regina" value="<?php if(isset($firstname['firstname'])) {echo(isset($firstname['firstname']));} ?>"/>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='lastname'>Last Name:</label><br/>
						</p></td>
					<td><p>
							<input type='text' name='lastname' required placeholder="Hill" value="<?php echo(isset($lastname['lastname'])); ?>"/>
						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='email'>Email Address:</label><br/>
						</p></td>
					<td><p>
							<input type='text' name='email' required placeholder="regina@tires.com" value="<?php echo(isset($email['email'])); ?>"/>
						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='phone'>Phone Number:</label><br/>
						</p></td>
					<td><p>
							<input type='tel' name='phone' required placeholder="8282845698" value="<?php echo(isset($phone['phone'])); ?>"/>
						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='member'>Member or Admin?:</label><br/>
						</p></td>
					<td><p>
							<input type="text" name="level" required placeholder="admin" value="<?php echo(isset($level['level'])); ?>"/>

						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='password'>Password:</label><br/>
						</p></td>
					<td><p>
							<input type='password' name='password' required placeholder="reginahill" value="<?php echo (isset($password['password'])); ?>"/>
						</p></td>
				</tr>

				<tr>
					<td><p>
					<?php echo Securimage::getCaptchaHtml() ?>
					</p></td>
				</tr>

				<tr>
					<td><p>
							<input type="submit" name="action" value="Submit"/>

						</p></td>
				</tr>
			</table>	
			</form>
		
	</div>
	<div id="map">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3231.3361999605677!2d-82.2590419!3d35.91427000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885a0977c3371b81%3A0x5e5842efca43815d!2s57+Tire+Shoppie+Dr%2C+Pisgah+National+Forest%2C+Burnsville%2C+NC+28714!5e0!3m2!1sen!2sus!4v1419786914855"
			width="500" height="450" frameborder="0" style="border:0"></iframe>

	</div>

</div>
</body>
</html>