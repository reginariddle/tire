<?php
if(!isset($_SESSION)) {
	$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
	session_set_cookie_params($lifetime, '/');
	session_start();
	include('../includes/functions.php');
}
?>
<!--
This is the Member Sales page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: sales.php
Description: This page is the page used as the sales page for members
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

						<div style="color:red;"><?php echo isset($_REQUEST['err']) && $_REQUEST['err'] == 1 ? "Invalid Password" : "";?></div>
						<legend>Login</legend>
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
				<div id="member_logout2">
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
			<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'Member') :?>
			
				<div id="nav">
					<ul>
						<li class="home"><a href="/tire/member/home.php">Home</a></li>
						<li class="home"><a href="/tire/member/history.php">History</a></li>
						<li class="home"><a href="/tire/member/services.php">Services</a></li>
						<li id="homeP"><a id="memberSales" href="/tire/member/sales.php">Sales</a></li>
						<li class="home"><a href="/tire/member/brands.php">Brands</a></li>

					</ul>
</div>
					<div id="mainMemberProfile">
	<h3>Your information has been entered into our database. Thank you for your interest!</h3>				
<?php
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$address2 = isset($_SESSION['address2']) ? $_SESSION['address2'] : '';
$city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$state = isset($_SESSION['state']) ? $_SESSION['state'] : '';
$zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : '';
$residence = isset($_SESSION['residence']) ? $_SESSION['residence'] : '';
$business = isset($_SESSION['business']) ? $_SESSION['business'] : '';
echo print_member_profile($firstname, $lastname, $address, $address2, $city, $state, $zip, $residence, $business); ?>
					</div>
					</div>
				<?php echo add_address($idaddresses, $idmembers, $address, $address2, $city, $state, $zip, $residence, $business); ?> 
			<?php endif;?>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>


			<div id="footer">

				

				<p>&nbsp;</p>
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
		</div>
	</div>
	<div id="hammer"></div>
	
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->



?>