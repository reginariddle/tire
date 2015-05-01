<?php
if(!isset($_SESSION)) {
	$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
	session_set_cookie_params($lifetime, '/');
	session_start();
}
?>
<!--
This is the Member History page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: history.php
Description: This page is the page used to detail the tire service's history
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<!DOCTYPE html>
<html>
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
				<?php if(!isset($_SESSION['level']) || $_SESSION['level'] != 'Member') :?>
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
				<div id="member_logout4">
				<form action="index.php" method="post" id="logoutform.php">

					<fieldset class="backsize">
						<legend>Logout</legend>

						<?php

						echo "Welcome, ";
						echo $_SESSION['level']. ", ";
						echo $_SESSION['loginName'];
						//echo get_name($results);
						?>  <br /> <br/> <br/> <br/>
						<input class="submit" type="submit" name="action" value="logout"/>

					</fieldset>
				</form>
				</div>
			<?php endif;?>
			<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'Member') :?>
			
				<div id="nav">
					<ul>
						<li class="home"><a href="/tire/member/home.php">Home</a></li>
						<li id="homeH"><a id="historyMember" href="/tire/member/history.php">History</a></li>
						<li class="home"><a href="/tire/member/services.php">Services</a></li>
						<li class="home"><a href="/tire/member/sales.php">Sales</a></li>
						<li class="home"><a href="/tire/member/brands.php">Brands</a></li>

					</ul>
					</div>
					<div id="mainMemberHistory">
					<article>
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
					</article>
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