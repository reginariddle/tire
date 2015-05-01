<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}
?>
<!-- 
This is the Administrator Search Name page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: searchname.php
Description: This page is the page used as the search name page
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
			<?php if(!isset($_SESSION['level']) || $_SESSION['level'] != 'Administrator') :?>
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
					<li id="homePage"><a id="invoices" href="/tire/admin/invoices.php">Invoices</a></li>
					<li class="home"><a href="/tire/admin/members.php">Members</a></li>
					<li class="home"><a href="/tire/admin/add.php">Add Tire</a></li>
					<li class="home"><a href="/tire/admin/delete.php">Delete Tire</a></li>

				</ul>
				</div>
				<div id="main">

					


						<table>

			<form method='post' action='saveinvoices.php' name='invoicesform' id='invoicesform'>
				<tr>
					<td>
						<p>
							<label for='date'>Date:</label><br />
						</p>
					</td>
					<td>
						<p>
							<input type='date' name='date' required placeholder="2015/04/23" value="<?php echo(isset($date['date'])); ?>"/>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='firstname'>First Name:</label><br/>
						</p>
					</td>
					<td>
						<p>
							<input type='text' name='firstname' required value="<?php echo(isset($firstname['firstname'])); ?>"/>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='lastname'>Last Name:</label><br/>
						</p></td>
					<td><p>
							<input type='text' name='lastname' required value="<?php echo(isset($lastname['lastname'])); ?>"/>
						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='idtires'>Tires ID:</label><br/>
						</p></td>
					<td><p>
							<input type='text' name='idtires' required value="<?php echo(isset($idtires['idtires'])); ?>"/>
						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='quantity'>Quantity:</label><br/>
						</p></td>
					<td><p>
							<input type='text' name='quantity' required value="<?php echo(isset($quantity['quantity'])); ?>"/>
						</p></td>
				</tr>
				<tr>
					<td>
						<p>
							<label for='paid'>Amount Paid:</label><br/>
						</p></td>
					<td><p>
							<input type="text" name="paid" required value="<?php echo(isset($paid['paid'])); ?>"/>

						</p></td>
				</tr>
		

				

				<tr>
					<td><p>
							<input type="submit" name="action" value="Submit"/>

						</p></td>
				</tr>
			</form>
		</table>
<p>&nbsp;</p>
				<?php echo get_invoices(); ?>

				<form action="searchname.php" method="post">
					<p>
						<label class="name" id="firstname">First:</label>
					</p>
					<p>
						<input id="first" type="text" name="firstname"
						value="<?php echo(isset($firstname['first'])); ?>"/></p>
					<p>
						<label class="name" id="lastname">Last:</label>
					</p>
						<input id="last" type="text" name="lastname" value="<?php echo(isset($lastname['last'])); ?>"
						<br/><br/><br/>
						<input type="submit" value="search"/>
					</p>
				</form>	
			
				<?php echo get_member_name(); ?>
		
			</div>
			<?php endif;?>
			

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>


			<div id="footer">

				
				<p>&nbsp;</p>
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
		</div>
	</div>
	<div id="hammer4"></div>
	
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->
<?php
$idmembers = '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
//function get_member_ids($lastname, $firstname) {
  global $db;
    $query = $db->prepare("SELECT idmembers FROM members WHERE last = '$lastname' AND first = '$firstname'");
    $query->execute();

    $idmembers = $query->fetch()['idmembers'];
    return $idmembers;
//}



function get_member_name() {
	global $db;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$idmembers = get_member_ids($lastname, $firstname);
	if (isset($idmembers)) {
		$query = $db->prepare("SELECT first, last, idmembers FROM members WHERE idmembers = '$idmembers'");
		$query->execute();

		$names = $query->fetchAll();
		if (isset($names)) {
			echo "<table id='namesearch'>";
			foreach ($names as $name) {
				echo "<tr><td id='labelsname'>";
				echo "Member Name: " . $name['first']." ".$name['last']."<br />";
				echo "Member ID: "	.$name['idmembers'];
				echo "</td></tr>";
			}
		} else {
			echo "<tr><td>";
			echo "We don't have your member id in our database!!!";
			echo "</td></tr></table>";
		}
	}
}



//include('invoices.php');
//var_dump($size);

?>