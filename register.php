<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('includes/functions.php');
require_once 'securimage/securimage.php';
require('includes/database_connection.php');
}
?>
<!--
This is the regular user register page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: register.php
Description: This page is the page used as the register page for regular users
Admin User: steve@tires.com with password steve
Member User: lou@tires.com with password lou
-->
<!DOCTYPE html>
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Steve & Angie's Tire Service</title>
  <link rel="stylesheet" href="css/web289.css" type="text/css"/>
<script src="js/lib/jquery.js"></script>
  <script src="js/dist/jquery.validate.js"></script>
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="css/ie.css" rel="stylesheet" type="text/css" />


</head>

<body>

<div id="wrapper">
  <div id="logo">

    <p>Steve & Angie's Tire Service<br/> 57 Tire Shoppie Drive <br/> Burnsville, NC 28714 <br/>(828) 682-7200</p>

    <div id="content">

      <p>&nbsp;</p>

      <p>&nbsp;</p>
      <div id="member_login" class="loginForm">
      <?php if(!isset($_SESSION['level']) || $_SESSION['level'] != 'Administrator') :?>
        <form action="index.php?action=login" method="post" id="login">
          <fieldset>
            <legend>Login</legend>
            <div style="color:red;"><?php echo isset($_REQUEST['err']) && $_REQUEST['err'] == 1 ? "Invalid Password" : "";?></div>
            
          
            <label for="loginName" class="required">Username:</label>
            <input id="loginName" name="loginName" type="text"
                   value="" required />
        
        
            <label for="password" class="required">Password:</label>
            <input id="password" name="password" type="password"
                   value="" required />
                
            <input id="submit" class="submit" type="submit" value="login"/>
          </fieldset>
        </form>
      </div>



      <?php else :?>
        <div id="member_logout">
        <form action="index.php" method="post" id="logoutform.php">

          <fieldset>
            <legend>Logout</legend>

            <?php
            echo "Welcome, ";
              echo $_SESSION['level']. ", ";
              echo $_SESSION['loginName'];
              //echo get_name($results); 
            ?>  <br /> <br/> <br/> <br/>
            <input class="submit" id="logout" type="submit" name="action" value="logout"/>

          </fieldset>
        </form>
      </div>
      <?php endif;?>
      <?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'Administrator') :?>
        <?php else :?>
      <div id="nav">
        <ul>
          <li id="homeLink"><a id="menu-home" href="home.php">Home</a></li>
          <li class="home"><a href="history.php">History</a></li>
          <li class="home"><a href="services.php">Services</a></li>
          <li class="home"><a href="model.php">Model</a></li>
          <li class="home"><a href="registration.php">Register</a></li>

        </ul>
      </div>
      </div>
        <div id="main">
        <p>&nbsp;</p>
<?php
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
//$conpassword = password_hash($_POST['conpassword'], PASSWORD_BCRYPT);
if ($_POST["level"] == 'member') {
  $level = 'm';
  //include('../member/logoutform.php');
}else {
  $level = 'a';
 // include('../admin/logoutform.php');
}
function add_member($idmembers,  $firstname,$lastname,  $email, $phone, $level, $password) {
    global $db;
    $query = "INSERT INTO members
                 (idmembers,  first,last, email, phone, level, password)
              VALUES
                 ('$idmembers',  '$firstname','$lastname', '$email', '$phone', '$level', '$password')";
  //  var_dump($query);
   // var_dump($db); 
    $db->exec($query);

}

      $image = new Securimage();
    if ($image->check($_POST['captcha_code']) == true) {
add_member($idmembers, $firstname, $lastname,  $email, $phone, $level, $password);
      
      echo "Correct! Please login to the site!!!!";
    } else {
      echo "Sorry, wrong code. <a href='/tire/registration.php'>Go back</a> to the registration page!!!";
    }
?>
         <form action="search.php" method="post">
          <p>
            <label class="search" id="searchSize">Search Size:</label>
          </p>
          <p>
            <input id="search" type="text" name="size"
            value="<?php echo(isset($size['size'])); ?>"/><br/><br/><br/>
            <input type="submit" value="search"/>
          </p>
        </form>
            
        
          
          
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
        <a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
      </div>
  

  <div id="hammer"></div>
</div></div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->
<!--
<?php
//require_once 'securimage/securimage.php';

//require('includes/database_connection.php');
//error_reporting(E_ALL); ini_set('display_errors', 1);
//$idmembers = '';
//$lastname = $_POST["lastname"];
//$firstname = $_POST["firstname"];
//$email = $_POST["email"];
//$phone = $_POST["phone"];
//$level = $_POST["level"];
//$size = $_POST["size"];
//$_SESSION['loginName'] = $_POST['loginName'];
//$_SESSION['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
//$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
//$conpassword = password_hash($_POST['conpassword'], PASSWORD_BCRYPT);



//if ($_POST["level"] == 'member') {
//  $level = 'm';
  //include('../member/logoutform.php');
//}else {
 // $level = 'a';
 // include('../admin/logoutform.php');
//}

/*
$image = new Securimage();
    if ($image->check($_POST['captcha_code']) == true) {
      add_member($idmembers, $firstname, $lastname,  $email, $phone, $level, $password);
      
    } else {
      echo "Sorry, wrong code.";
    }

*/
?>