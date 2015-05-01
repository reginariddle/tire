<?php

require('../includes/database_connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$idmembers = '';
$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$level = $_POST["level"];
//$size = $_POST["size"];
//$_SESSION['loginName'] = $_POST['loginName'];
$_SESSION['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$conpassword = password_hash($_POST['conpassword'], PASSWORD_BCRYPT);


if ($_POST["level"] == 'member') {
	$level = 'm';
	//include('../includes/logoutform.php');
} else {
	$level = 'a';
	//include('../includes/logoutform.php');
}


function add_member($idmembers, $firstname, $lastname, $email, $phone, $level, $password) {
	global $db;
	$query = "INSERT INTO members
                 (idmembers,  first,last, email, phone, level, password)
              VALUES
                 ('$idmembers',  '$firstname','$lastname', '$email', '$phone', '$level', '$password')";
	//var_dump($query);
	// var_dump($db);
	$db->exec($query);

}


/*if(isset($_POST['submit']))
{
$level = $_POST['level'];
$level = "";
foreach ($level as $level) 
{
$level .= $level . ", ";
}
$level = substr($level, 0, -2);
 // now here in your insert query take mid='".$selected_checkbox."';
}*/


/*



if(!isset($_POST['submit']))
{
    if (strstr("$email", "@")){

        if($password == $conpassword) {
            $query = $db->prepare("SELECT * FROM members WHERE  OR firstname = ? lastname = ? OR email = ? OR phone = ? OR level = ? OR password = ?");
$query = $query->execute(array($firstname,$lastname,$email,$phone,$level,$password));

$count=$query->rowCount();
if($count == 0){
  $query = $db->prepare("INSERT INTO members SET  firstname = ?, lastname = ?, email = ?, phone = ?, level = ?, password = ?");
  $query = $query->execute(array(
  
  $firstname,
  $lastname,
  $email,
  $phone,
  $level,
  $password
));
  if($query){
    echo "Your account has been registered!!! Please login now.";
  }
}else{

echo "A user already exists with that username and password";
}
}else {

  echo "Your passwords do not match!!!";

}}else {
  echo "Invalid email address!!!";
}
    echo "Form is not submitted!";

if(empty($_POST["firstname"]) ||
	empty($_POST["lastname"]) ||
	empty($_POST["email"])  ||
	empty($_POST["phone"]) ||
  empty($_POST["level"]) ||
	empty($_POST["password"]) ||
  empty($_POST["conpassword"])) 
    {
        echo "Please fill out the form";
        exit;
    }}
else*/
add_member($idmembers, $firstname, $lastname, $email, $phone, $level, $password);


//mail( 'reginahill@students.abtech.edu' , 'New form submission' , 
//"New form submission: Name: $firstname $lastname, Email:$email"  );

//header('Location: thankyou.html');

include('index.php');

?>