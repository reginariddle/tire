<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}

/*
function get_tires_for_delete() {
	global $db;
	$query = $db->prepare("SELECT * FROM tires");
	$query->execute();
	$tires = $query->fetchAll();} 
get_tires_for_delete();
*/
$query = 'SELECT * FROM tires';
$tires = $db->query($query);


?>

<!DOCTYPE html>
<html>
<!-- 
This is the Administrator Delete page 
Author: Regina Hill
Revision Date: 4/8/2015
File Name: delete.php
Description: This page is the page used to delete a tire from the database
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
				<li class="home"><a href="/tire/admin/members.php">Members</a></li>
				<li class="home"><a href="/tire/admin/add.php">Add Tire</a></li>
				<li id="homePage"><a id="registrationAdmin" href="/tire/admin/delete.php">Delete Tire</a></li>

			</ul>
				</div>
				
				<div id="main">
					<h3>Delete a tire:</h3>
					
					<table>
						<tr>
							<th>Tire ID</th>
							<th>Tire Size</th>
							<th>Price</th>
							<th>Mileage</th>
							<th>Tire Model</th>
						</tr>
					<?php foreach ($tires as $tire) : ;?>
						<tr>
							<td><?php echo $tire['idtires']; ?></td>
							<td><?php echo $tire['size']; ?></td>
							<td><?php echo $tire['price']; ?></td>
							<td><?php echo $tire['mileage']; ?></td>
							<td><?php echo $tire['idtiremodel']; ?></td>
							
							<td><?php echo '<form action="delete_tire.php" method="post" id="delete_tire_form">' ?></td>
							<td><?php echo '<input type="hidden" name="idtires" value="<?php echo $tire["idtires"]; ?>' ?></td>
							<td><?php echo '<input type="submit" value="Delete" /></form>'; ?></td>
						</tr>
					<?php endforeach; ?>
					</table>

				</div>
			</div>
			<?php endif;?>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>


			<div id="footer">

				
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
		</div></div>
	</div>
	<div id="hammer"></div>
	<div id="butter"></div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->