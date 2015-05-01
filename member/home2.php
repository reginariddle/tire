<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}
?>
<!--
This is the Member Home page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: home.php
Description: This page is the page used as the home page for members
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Steve & Angie's Tire Service</title>
	<link rel="stylesheet" href="../css/web289.css" type="text/css"/>

<script src="../js/lib/jquery.js"></script>
	<script src="../js/dist/jquery.validate.js"></script>
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
</head>

<body>


<div id="wrapper">
	<div id="logo">

		<p>Steve & Angie's Tire Service<br/> 57 Tire Shoppie Drive <br/> Burnsville, NC 28714 <br/>(828) 682-7200</p>

		<div id="content">

			<p>&nbsp;</p>

			<p>&nbsp;</p>
			<div id="member_login">
				<?php if(!isset($_SESSION['level']) || $_SESSION['level'] != 'Member') :?>
				<form action="index.php?action=login" method="post" id="login">
					<fieldset>

						<div style="color:red;"><?php echo isset($_REQUEST['err']) && $_REQUEST['err'] == 1 ? "Invalid Password" : "";?></div>
						<legend>Login</legend>
						<label for="loginName" class="required">Username:</label>
						<input id="loginName" name="loginName" placeholder="regina@tires.com" type="text"
						       value=""/>
						<label for="password" class="required">Password:</label>
						<input id="password" name="password" placeholder="regina" type="password"
						       value=""/>
						<input id="login" class="submit" type="submit" value="login"/>
					</fieldset>
				</form>
			</div>
			<?php else :?>
				<form action="index.php" method="post" id="logoutform.php">

					<fieldset>
						<legend>Logout</legend>

						<?php

						echo "Welcome, ";
						echo $_SESSION['level']. ", ";
						echo $_SESSION['loginName'];
						//echo get_name($results);
						?>  <br /> <br/> <br/> <br/>
						<input type="submit" name="action" value="logout"/>

					</fieldset>
				</form>
			<?php endif;?>
			<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'Member') :?>

				<div id="nav">
					<ul>
						<li id="homePage"><a id="homeMember" href="/tire/member/home.php">Home</a></li>
						<li class="home"><a href="/tire/member/history.php">History</a></li>
						<li class="home"><a href="/tire/member/services.php">Services</a></li>
						<li class="home"><a href="/tire/member/sales.php">Sales</a></li>
						<li class="home"><a href="/tire/member/brands.php">Brands</a></li>

					</ul>
					<div id="main">

					<div id="search">


						<table>
							<form action="search.php" method="post">
								<tr>
									<td>
										<p>
											<label for="searchSize" class="search" id="searchSize">Search Size:</label>
										</p>
									</td>
									<td>
										<p>
											<input type="text" name="size" id="size"
											       value="<?php echo(isset($size['size'])); ?>"/><br/><br/><br/>
											
										</p>
									</td>
									<td>
										<p>
											<input type="submit" value="find size"/>

										</p>
									</td>
								</tr>
							</form>
						</table>

					</div>
						<p id="memberHomeArticle">
							 
<?php echo get_vehicle(); ?>
<select name="carmodels" id="models" disabled>
<option></option>
</select>

						</p>
					</div>
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

				<p>&nbsp;</p>

				<p>&nbsp;</p>

				<p>&nbsp;</p>

				<p>&nbsp;</p>
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
		</div>
	</div>
	<div id="hammer"></div>
	<div id="butter"></div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->