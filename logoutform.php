<!DOCTYPE html>
<html>
<!--
This is the regular user logoutform page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: logoutform.php
Description: This page is the page used as the logoutform page for regular users
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
				<form method="post" id="logoutform.php">

					<fieldset>
						<legend>Logout</legend>

						<?php

						if ($_SESSION['loginName'] === $results['email'] && $_SESSION['password'] === $results['password']) {
							echo "Welcome, ";
							echo "$level, ";
							echo get_name($results);
							// print_r($_POST);
							print '<br />';
						} else {
							var_dump($results);
						}
						?>   <br/> <br/> <br/>
						<input type="submit" name="action" value="logout"/>

					</fieldset>
				</form>
			</div>
			<div id="nav">
				<ul>
					<li class="home"><a href="index.php">Home</a></li>
					<li class="home"><a href="history.php">History</a></li>
					<li class="home"><a href="services.php">Services</a></li>
					<li class="home"><a href="contact.php">Contact</a></li>
					<li class="home"><a href="registration.php">Register?</a></li>

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
											<input type="submit" value="find size"/>

										</p>
									</td>
								</tr>
							</form>
						</table>

					</div>

				</div>
			</div>

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
