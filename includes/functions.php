<?php
require('database_connection.php');
/* 
This is the functions library page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: functions.php
Description: This page is the page used for the functions used in the project
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
*/

//connect to the database and return the array $results
function connect($loginName) {
	global $db;
	$query = "SELECT email, level, password FROM members WHERE email = '$loginName'";
	$result = $db->query($query);
	$results = $result->fetch(PDO::FETCH_ASSOC);
	return $results;
}

//Login to member or admin pages

function login($loginName, $password) {
	$results = connect($loginName);

	if(!$results) {
		header('Location: /tire/admin/home.php?err=1');
	}

	if ($loginName === $results['email'] && password_verify($password,$results['password'])) {
		$_SESSION['loginName'] = $loginName;
		
		if ($results['level'] === 'a') { // 1 == Administrator
			$_SESSION['level'] = 'Administrator';
			header('Location: /tire/admin/home.php');
		} elseif ($results['level'] === 'm') { // 1 == Member
			$_SESSION['level'] = 'Member';
			header('Location: /tire/member/home.php');
			exit;
		}
	}

	header('Location: /tire/admin/home.php');
}


//Logout
function logout() {
	$_SESSION = array();
	session_destroy();
}



//Get tire models and list for a models page on the main user site
function get_models() {
	global $db;
	$query = $db->prepare("SELECT name FROM tiremodel");
	$query->execute();
	$tiremodels = $query->fetchAll();

	if(isset($tiremodels)) {
		echo "<ul id='tiremodels'>";
		foreach ($tiremodels as $model){
			echo "<li>";
			echo $model['name'];
			echo "</li>";
		}echo "</ul>";
	} 
}

//Get tire brands - intended to use, but replaced the list of brands with a image
function get_brands() {
	global $db;
	$query = $db->prepare("SELECT idbrand, brand FROM tirebrand");
	$query->execute();
	$tirebrands = $query->fetchAll();

	if(isset($tirebrands)) {
		echo "<ul id='tiremodels'>";
		echo "Tire Brands:";
		foreach ($tirebrands as $brand){
			echo "<li>";
			echo $brand['idbrand']."  ".$brand['brand'];
			echo "</li>";
		}echo "</ul>";
	} 
}

//Get the vehicles into a drop down list
function get_vehicle() {
	global $db;
	$query = $db->prepare("SELECT idmanufacturer, name FROM manufacturer");
	$query->execute();
	$vehicles = $query->fetchAll();

	if(isset($vehicles)) {
		echo "<label>Vehicle:</label>";
		echo "<select name='vehicle'>";
		foreach ($vehicles as $vehicle){
			echo '<option value="'.$vehicle['name'].'">'.$vehicle['name'].'</option>';
		}echo "</select>";
		echo "<br />";
	}
}


//Get the list of states for selection on address form
function get_state() {
	global $db;
	$query = $db->prepare("SELECT idstate, name FROM state");
	$query->execute();
	$states = $query->fetchAll();

	if(isset($states)) {
		echo "<label>State:</label>";
		echo "<select name='state' id='state'>";
		foreach ($states as $state){
			echo '<option value="'.$state['name'].'">'.$state['name'].'</option>';
		}echo "</select>";
		echo "<br />";
	}
}

//function to test the loginName
function test_input($loginName) {
  $data = trim($loginName);
  $data = stripslashes($loginName);
  $data = htmlspecialchars($loginName);
  return $data;
 }

//function to validate the user
function validate_user() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loginName = test_input($_POST["loginName"]);
  $password = test_input($_POST["password"]);
}
if ((isset($loginName)) && (isset($password))){

	login($loginName, $password);}
	else {
		echo "Username Required";
	}
}


// function to get the members
function get_members() {
	global $db;
	$query = $db->prepare("SELECT * FROM members");
	$query->execute();
	$members = $query->fetchAll();

	if(isset($members)) {
		echo "<table id='members'>";
		echo "<tr><td>Member:</td></tr>";
		foreach ($members as $member){
			echo "<tr><td>";
			echo "".$member['first']." ".$member['last'].' </td><td>'.$member['email'].' </td><td>'.$member['level'];
			$_SESSION['email'] = $member['email'];
			$email = $_SESSION['email'];
			global $email;
			echo "</td></tr>";
		}echo "</table>";
	} 
}


//function to get the tires and tire information
function get_tires() {
	global $db;
	$query = $db->prepare("SELECT * FROM tires");
	$query->execute();
	$tires = $query->fetchAll();

	if(isset($tires)) {
		echo "<table id='tires'>";
		echo "Tire: <br />";
		echo "<th>Tire Size</th><th>Price</th><th>Mileage</th><th>Tire Model</th>";
		foreach ($tires as $tire){
			echo "<tr><td>";
			echo "".$tire['size']."  </td><td>    ".$tire['price'].' </td><td>'.$tire['mileage'].' </td><td>'.$tire['idtiremodel'];
			echo "</td></tr>";
		}echo "</table>";
	} 
}

//function to get the invoices for the invoices page
function get_invoices() {

	global $db;
	$query = $db->prepare("SELECT * FROM invoices");
	$query->execute();
	$invoices = $query->fetchAll();



	if(isset($invoices)) {
		echo "<table id='members'>";
		echo "Invoice: <br />";
		echo "<th>Invoice ID</th><th>Member ID</th><th>Date</th><th>Tire ID</th><th>Quantity</th><th>Amount Paid</th>";
		foreach ($invoices as $invoice){
			echo "<tr><td>";
			echo "".$invoice['idinvoices'].'</td><td>'.$invoice['idmembers'].' </td><td>'.$invoice['date'].' </td><td>'.$invoice['idtires'].'</td><td>'.$invoice['quantity'].'</td><td>'.$invoice['paid'];
			echo "</td></tr>";
		}echo "</table>";
	} 
}


if (isset($_POST['firstname']) && (isset($_POST['lastname']))) {
	$_SESSION['firstname'] = $_POST['firstname'];
	$_SESSION['lastname'] = $_POST['lastname'];
	$first = $_SESSION['firstname'];
	$last = $_SESSION['lastname'];

}



//function to print the member profile

function print_member_profile($firstname, $lastname,  $address, $address2, $city, $state, $zip, $residence, $business){

if (isset($_POST['firstname'])) {$firstname = $_POST['firstname'];}
//if (isset($_POST['lastname'])) {$lastname = $_POST['lastname'];}
if (isset($_POST['lastname'])) {$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';}
if (isset($_POST['address'])) {$address = $_POST['address'];}
if (isset($_POST['address2'])) {$address2 = $_POST['address2'];}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['state'])) {$state = $_POST['state'];}
if (isset($_POST['zip'])) {$zip = $_POST['zip'];}
if (isset($_POST['residence'])) {$residence = $_POST['residence'];}
if (isset($_POST['business'])) {$business = $_POST['business'];}

  echo '<p id="firstlastnames">Name: '.$firstname.' '.$lastname. '</p><br />';
  echo '<p id="idaddress">Address: '.$address. '</p><br />';
  echo '<p id="idaddress2">Address 2:'.$address2. '</p><br />';
  echo '<p id="city">City: '.$city. '</p><br />';
  echo '<p id="state">State: '.$state. '</p><br />';
  echo '<p id="zip">Zip: '.$zip. '</p><br />';
  echo '<p id="residence">Residence: '.$residence. '</p><br />';
  echo '<p id="business">Business: '.$business. '</p><br />';
}


//function to get the member ids
$idaddresses = '';
$idmembers = '';//get_members();''
$lastname = isset($_SESSION["lastname"]) ? $_SESSION["lastname"] : '';
$firstname = isset($_SESSION["firstname"]) ? $_SESSION["firstname"] : '';
$address = isset($_SESSION["address"]) ? $_SESSION["address"] : '';
$address2 = isset($_SESSION["address2"]) ? $_SESSION["address2"] : '';
$city = isset($_SESSION["city"]) ? $_SESSION["city"] : '';
$state = isset($_SESSION["state"]) ? $_SESSION["state"] : '';
$zip = isset($_SESSION["zip"]) ? $_SESSION["zip"] : '';
$residence = isset($_SESSION["residence"]) ? $_SESSION["residence"] : '';
$business = isset($_SESSION["business"]) ? $_SESSION["business"] : '';

$idmembers = isset($_SESSION["idmembers"]) ? $_SESSION["idmembers"] : '';
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';

function get_member_ids($lastname, $firstname) {
  global $db;
    $query = $db->prepare("SELECT idmembers FROM members WHERE last = '$lastname' AND first = '$firstname'");
    $query->execute();

    $idmembers = $query->fetch()['idmembers'];
    return $idmembers;
}

//function to add the address to the database

function add_address($idaddresses, $idmembers,  $address, $address2, $city, $state, $zip, $residence, $business) {
    global $db;
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$zip = isset($_POST['zip']) ? $_POST['zip'] : '';
$residence = isset($_POST['residence']) ? $_POST['residence'] : '';
$business = isset($_POST['business']) ? $_POST['business'] : '';
    $idmembers = get_member_ids($lastname, $firstname);
    $query = "INSERT INTO addresses
                 (idaddresses, idmembers, address, address2, city, state, zip, residence, business)
              VALUES
                 ('$idaddresses', '$idmembers', '$address', '$address2', '$city', '$state', '$zip', '$residence', '$business')";
   // var_dump($query);
   // var_dump($db); 
    $db->exec($query);

}
//}
//}
//}


?>