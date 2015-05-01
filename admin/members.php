<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}
?>

<!DOCTYPE html>
<html>
<!-- 
This is the Administrator Members page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: members.php
Description: This page is the page used as the members page
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Steve & Angie's Tire Service</title>
	<link rel="stylesheet" href="../css/web289.css" type="text/css"/>

</head>

<body>


<div id="wrapper">
	<div id="logo">

		<p>Steve & Angie's Tire Service<br/> 57 Tire Shoppie Drive <br/> Burnsville, NC 28714 <br/>(828) 682-7200</p>

		<div id="content">

			<p>&nbsp;</p>

			<p>&nbsp;</p>
			<div id="member_login">
			<?php if(!isset($_SESSION['level']) || $_SESSION['level'] != 'Administrator') :?>
				<form action="index.php?action=login" method="post">
					<fieldset>
						<legend>Login</legend>
						<div style="color:red;"><?php echo isset($_REQUEST['err']) && $_REQUEST['err'] == 1 ? "Invalid Password" : "";?></div>
						
						<label for="loginName" class="required">Username:</label>
						<input id="loginName" name="loginName" placeholder="regina@tires.com" type="text"
						       value=""/>
						<label for="password" class="required">Password:</label>
						<input id="password" name="password" placeholder="regina" type="password"
						       value=""/>
						<input id="submit" class="submit" type="submit" value="login"/>
					</fieldset>
				</form>
			</div>
			
			<?php else :?>
				<div id="member_logout3">
				<form action="index.php" method="post" id="logoutform.php">

					<fieldset>
						<legend>Logout</legend>

						<?php
						
						echo "Welcome, ";
							echo $_SESSION['level']. ", ";
							echo $_SESSION['loginName'];

					
						?>  <br /> <br/> <br/> <br/>
						<input class="submit" type="submit" name="action" value="logout"/>

					</fieldset>
				</form>
				</div>
			<?php endif;?>
			<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'Administrator') :?>
			<div id="nav">
				<ul>
					<li class="home"><a href="/tire/admin/home.php">Home</a></li>
					<li class="home"><a href="/tire/admin/invoices.php">Invoices</a></li>
					<li id="homePage"><a id="members" href="/tire/admin/members.php">Members</a></li>
					<li class="home"><a href="/tire/admin/add.php">Add Tire</a></li>
					<li class="home"><a href="/tire/admin/delete.php">Delete Tire</a></li>

				</ul>
				</div>
				<div id="main">

					
					<h3>List of Members:</h3>
					<?php echo get_members(); ?>
				</div>
			</div>
			<?php endif;?>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>


			<div id="footer">

				

				<p>&nbsp;</p>
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
		</div></div>
	</div>
	<div id="hammer"></div>
	<div id="butter"></div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->