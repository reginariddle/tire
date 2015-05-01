<?php
if(!isset($_SESSION)) {
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
include('../includes/functions.php');
}
?>
<!--
This is the Member Search page 
Author: Regina Hill
Revision Date: 4/21/2015
File Name: search.php
Description: This page is the page used for search in members
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
				<div id="member_logout2">
				<form action="index.php" method="post" id="logoutform.php">

					<fieldset>
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
						<li id="homePage"><a id="homeMember" href="/tire/member/home.php">Home</a></li>
						<li class="home"><a href="/tire/member/history.php">History</a></li>
						<li class="home"><a href="/tire/member/services.php">Services</a></li>
						<li class="home"><a href="/tire/member/sales.php">Sales</a></li>
						<li class="home"><a href="/tire/member/brands.php">Brands</a></li>

					</ul>
					</div></div>
					<div id="mainMemberHome">
							<h3>Search for your tire size</h3>

					<form action="index.php?action=search" method="post">
					<p>
						<label for="searchSize" class="search" id="searchSize">Search Size:</label>
					</p>
					<p>
						<input id="search" type="text" name="size" id="size"
						value="<?php echo(isset($size['size'])); ?>"/><br/><br/><br/>
						<input type="submit" value="search"/>
					</p>
				</form>
				<?php echo tiresize(); ?>	
								<div id="vehicledropdown">
				<form action="searchCars.php" method="post">
				<select class="select" id="province" onchange="filterCity();">
  <option idmanufacturer="1" value="1">Acura</option>
  <option idmanufacturer="2" value="2">BMW</option>
  <option idmanufacturer="3" value="3">Cadillac</option>
  <option idmanufacturer="4" value="4">Chevrolet</option>
  <option idmanufacturer="5" value="5">Chrysler</option>
  <option idmanufacturer="6" value="6">Dodge</option>
  <option idmanufacturer="7" value="7">Ford</option>
  <option idmanufacturer="8" value="8">GMC</option>
  <option idmanufacturer="9" value="9">Honda</option>
  <option idmanufacturer="10" value="10">Hyundai</option>
  <option idmanufacturer="11" value="11">Jaquar</option>
  <option idmanufacturer="12" value="12">Kia</option>
  <option idmanufacturer="13" value="13">Lincoln</option>
  <option idmanufacturer="14" value="14">Mazda</option>
  <option idmanufacturer="15" value="15">Mitsubishi</option>
  <option idmanufacturer="16" value="16">Nissan</option>
  <option idmanufacturer="17" value="17">Porshe</option>
  <option idmanufacturer="18" value="18">Subaru</option>
  <option idmanufacturer="19" value="19">Toyota</option>
  <option idmanufacturer="20" value="20">Volvo</option>
</select>

<select name="car" class="select" id="city">
  <option data-province="Acura" idcarmodel="9" value="1">MDX</option>
  <option data-province="Acura" idcarmodel="11" value="2">RDX</option>
  <option data-province="Acura" idcarmodel="10" value="3">RLX</option>
  <option data-province="BMW" idcarmodel="12" value="4">320i</option>
  <option data-province="BMW" idcarmodel="13" value="5">320i Xdrive</option>
  <option data-province="BMW" idcarmodel="14" value="6">428i</option>
  <option data-province="BMW" idcarmodel="15" value="7">428i Gran Coupe</option>
  <option data-province="BMW" idcarmodel="16" value="8">428i Xdrive</option>
  <option data-province="BMW" idcarmodel="17" value="9">428i Xdrive Gran Coupe</option>
  <option data-province="BMW" idcarmodel="18" value="10">435i</option>
  <option data-province="BMW" idcarmodel="19" value="11">435i Xdrive</option>
  <option data-province="BMW" idcarmodel="20" value="12">435 Gran Coupe</option>
  <option data-province="BMW" idcarmodel="21" value="13">435 Xdrive Gran Coupe</option>
  <option data-province="BMW" idcarmodel="22" value="14">640i</option>
  <option data-province="BMW" idcarmodel="23" value="15">640i Xdrive</option>
  <option data-province="BMW" idcarmodel="24" value="16">640i Gran Coupe</option>
  <option data-province="BMW" idcarmodel="25" value="17">640i Xdrive Gran Coupe</option>
  <option data-province="BMW" idcarmodel="26" value="18">650i</option>
  <option data-province="BMW" idcarmodel="27" value="19">650i Xdrive</option>
  <option data-province="BMW" idcarmodel="28" value="20">650i Xdrive Gran Coupe</option>
  <option data-province="BMW" idcarmodel="29" value="21">650i Gran Coupe</option>
  <option data-province="BMW" idcarmodel="30" value="22">740i</option>
  <option data-province="BMW" idcarmodel="31" value="23">740 LD Xdrive</option>
  <option data-province="BMW" idcarmodel="32" value="24">740Li</option>
  <option data-province="BMW" idcarmodel="33" value="25">750i</option>
  <option data-province="BMW" idcarmodel="34" value="26">750i Xdrive</option>
  <option data-province="BMW" idcarmodel="35" value="27">750Li Xdrive</option>
  <option data-province="BMW" idcarmodel="36" value="28">ActiveHybrid 3</option>
  <option data-province="BMW" idcarmodel="37" value="29">ActiveHybrid 5</option>
  <option data-province="BMW" idcarmodel="38" value="30">ActiveHybrid 7</option>
  <option data-province="BMW" idcarmodel="39" value="31">Alpina B7</option>	
  <option data-province="BMW" idcarmodel="40" value="32">Alpina B7 Xdrive</option>
  <option data-province="BMW" idcarmodel="41" value="33">Alpina B7 L</option>
  <option data-province="BMW" idcarmodel="42" value="34">Alpina B7 L Xdrive</option>
  <option data-province="BMW" idcarmodel="43" value="35">M3</option>
  <option data-province="BMW" idcarmodel="44" value="36">M4</option>
  <option data-province="BMW" idcarmodel="45" value="37">M6</option>
  <option data-province="BMW" idcarmodel="46" value="38">M6 Gran Coupe</option>
  <option data-province="BMW" idcarmodel="47" value="39">X3</option>
  <option data-province="BMW" idcarmodel="48" value="40">Z4</option>
  <option data-province="Cadillac" idcarmodel="49" value="41">ATS</option>
  <option data-province="Cadillac" idcarmodel="50" value="42">Escalade</option>
  <option data-province="Cadillac" idcarmodel="51" value="43">Escalade ESV</option>
  <option data-province="Chevrolet" idcarmodel="52" value="44">City Express</option>
  <option data-province="Chevrolet" idcarmodel="53" value="45">Colorado</option>
  <option data-province="Chevrolet" idcarmodel="54" value="46">Silverado 1500</option>
  <option data-province="Chevrolet" idcarmodel="55" value="47">Silverado 2500 HD</option>
  <option data-province="Chevrolet" idcarmodel="56" value="48">Silverado 3500 HD</option>
  <option data-province="Chevrolet" idcarmodel="57" value="49">Spark EV</option>
  <option data-province="Chevrolet" idcarmodel="58" value="50">Suburban</option>
  <option data-province="Chevrolet" idcarmodel="59" value="51">Tahoe</option>
  <option data-province="Chrysler" idcarmodel="60" value="52">200</option>
  <option data-province="Dodge" idcarmodel="61" value="53">Challenger</option>
  <option data-province="Dodge" idcarmodel="62" value="54">Charger</option>
  <option data-province="Dodge" idcarmodel="63" value="55">Dart</option>
  <option data-province="Dodge" idcarmodel="64" value="56">Durango</option>
  <option data-province="Dodge" idcarmodel="65" value="57">Journey</option>
  <option data-province="Dodge" idcarmodel="66" value="58">Grand Caravan</option>
  <option data-province="Dodge" idcarmodel="67" value="59">SRT</option>
  <option data-province="Dodge" idcarmodel="68" value="60">Ram</option>
  <option data-province="Dodge" idcarmodel="69" value="61">Crossroad</option>
  <option data-province="Ford" idcarmodel="70" value="62">F-250 Super Duty</option>
  <option data-province="Ford" idcarmodel="71" value="63">F-350 Super Duty</option>
  <option data-province="Ford" idcarmodel="72" value="64">F-450 Super Duty</option>
  <option data-province="Ford" idcarmodel="73" value="65">Mustang</option>
  <option data-province="Ford" idcarmodel="74" value="66">Transit-250</option>
  <option data-province="Ford" idcarmodel="75" value="67">Transit-350</option>
  <option data-province="Ford" idcarmodel="76" value="68">Transit-350 HD</option>
  <option data-province="GMC" idcarmodel="77" value="69">Canyon</option>
  <option data-province="GMC" idcarmodel="78" value="70">Sierra 1500</option>
  <option data-province="GMC" idcarmodel="79" value="71">Sierra 2500 HD</option>
  <option data-province="GMC" idcarmodel="80" value="72">Sierra 3500 HD</option>
  <option data-province="GMC" idcarmodel="81" value="73">Yukon</option>
  <option data-province="GMC" idcarmodel="82" value="74">Yukon XL</option>
  <option data-province="Honda" idcarmodel="83" value="75">Accord</option>
  <option data-province="Honda" idcarmodel="84" value="76">Civic</option>
  <option data-province="Honda" idcarmodel="85" value="77">CR-V</option>
  <option data-province="Honda" idcarmodel="86" value="78">Pilot</option>
  <option data-province="Honda" idcarmodel="87" value="79">Odyssey</option>
  <option data-province="Honda" idcarmodel="88" value="80">Fit</option>
  <option data-province="Honda" idcarmodel="89" value="81">Crosstour</option>
  <option data-province="Honda" idcarmodel="90" value="82">Insight</option>
  <option data-province="Honda" idcarmodel="91" value="83">CR-Z</option>
  <option data-province="Hyundai" idcarmodel="92" value="84">Accent</option>
  <option data-province="Hyundai" idcarmodel="93" value="85">Elantra</option>
  <option data-province="Hyundai" idcarmodel="94" value="86">Elantra Coupe</option>
  <option data-province="Hyundai" idcarmodel="95" value="87">Elantra GT</option>
  <option data-province="Hyundai" idcarmodel="96" value="88">Veloster</option>
  <option data-province="Hyundai" idcarmodel="97" value="89">Sonata</option>
  <option data-province="Hyundai" idcarmodel="98" value="90">Azera</option>
  <option data-province="Hyundai" idcarmodel="99" value="91">Sonata Hybrid</option>
  <option data-province="Hyundai" idcarmodel="100" value="92">Tucson</option>
  <option data-province="Hyundai" idcarmodel="101" value="93">Santa Fe</option>
  <option data-province="Hyundai" idcarmodel="102" value="94">Genesis Coupe</option>
  <option data-province="Hyundai" idcarmodel="103" value="95">Genesis</option>
  <option data-province="Hyundai" idcarmodel="104" value="96">Equus</option>
  <option data-province="Jaquar" idcarmodel="105" value="97">F-Type</option>
  <option data-province="Jaquar" idcarmodel="106" value="98">XK</option>
  <option data-province="Jaquar" idcarmodel="107" value="99">XKR</option>
  <option data-province="Jaquar" idcarmodel="108" value="100">XKR-S</option>
  <option data-province="Kia" idcarmodel="109" value="101">K900</option>
  <option data-province="Kia" idcarmodel="110" value="102">Sorento</option>
  <option data-province="Lincoln" idcarmodel="111" value="103">MKC</option>
  <option data-province="Lincoln" idcarmodel="112" value="104">Navigator</option>
  <option data-province="Mazda" idcarmodel="113" value="105">6</option>
  <option data-province="Mazda" idcarmodel="114" value="106">CX-5</option>
  <option data-province="Mitsubishi" idcarmodel="115" value="107">Lancer</option>
  <option data-province="Mitsubishi" idcarmodel="116" value="108">Lancer Evolution</option>
  <option data-province="Mitsubishi" idcarmodel="117" value="109">Outlander Sport</option>
  <option data-province="Mitsubishi" idcarmodel="118" value="110">I-Miev</option>
  <option data-province="Mitsubishi" idcarmodel="119" value="111">Mirage</option>
  <option data-province="Mitsubishi" idcarmodel="120" value="112">Outlander</option>
  <option data-province="Nissan" idcarmodel="121" value="113">GT-R</option>
  <option data-province="Porshe" idcarmodel="122" value="114">Macan</option>
  <option data-province="Volvo" idcarmodel="123" value="115">S60</option>
  <option data-province="Volvo" idcarmodel="124" value="116">S80</option>
  <option data-province="Volvo" idcarmodel="125" value="117">V60</option>
  <option data-province="Volvo" idcarmodel="126" value="118">XC60</option>
  <option data-province="Volvo" idcarmodel="127" value="119">XC70</option>
  <option data-province="Toyota" idcarmodel="128" value="120">Yaris</option>
  <option data-province="Toyota" idcarmodel="129" value="121">Corolla</option>
  <option data-province="Toyota" idcarmodel="130" value="122">Camry</option>
  <option data-province="Toyota" idcarmodel="131" value="123">Avalon</option>
  <option data-province="Toyota" idcarmodel="132" value="124">Sienna</option>
  <option data-province="Toyota" idcarmodel="133" value="125">Tacoma</option>
  <option data-province="Toyota" idcarmodel="134" value="126">Tundra</option>
  <option data-province="Toyota" idcarmodel="135" value="127">Rav4</option>
  <option data-province="Toyota" idcarmodel="136" value="128">Venza</option>
  <option data-province="Toyota" idcarmodel="137" value="129">Highlander</option>
  <option data-province="Toyota" idcarmodel="138" value="130">4Runner</option>
  <option data-province="Toyota" idcarmodel="139" value="131">Sequoia</option>
  <option data-province="Toyota" idcarmodel="140" value="132">Land Cruiser</option>
  <option data-province="Toyota" idcarmodel="141" value="133">Camry Hybrid</option>
  <option data-province="Toyota" idcarmodel="142" value="134">Avalon Hybrid</option>
  <option data-province="Toyota" idcarmodel="143" value="135">Highlander Hybrid</option>
  <option data-province="Toyota" idcarmodel="144" value="136">Prius</option>
  <option data-province="Toyota" idcarmodel="145" value="137">Prius c</option>
  <option data-province="Toyota" idcarmodel="146" value="138">Prius Plug-in Hybrid</option>
  <option data-province="Toyota" idcarmodel="147" value="139">Prius v</option>
  <option data-province="Subaru" idcarmodel="1" value="140">Outback</option>
  <option data-province="Subaru" idcarmodel="2" value="141">Impreza</option>
  <option data-province="Subaru" idcarmodel="3" value="142">Forester</option>
  <option data-province="Subaru" idcarmodel="4" value="143">WRX</option>
  <option data-province="Subaru" idcarmodel="5" value="144">Legacy</option>
  <option data-province="Subaru" idcarmodel="6" value="145">XV Crosstrek</option>
  <option data-province="Subaru" idcarmodel="7" value="146">XV Crosstrek Hybrid</option>
  <option data-province="Subaru" idcarmodel="8" value="147">BRZ</option>
</select>
<span id="option-container" style="visibility: hidden; position:absolute;"></span>
<input type="submit" value="search"/>
</form>

<?php echo findtire(); ?>
				</div>
			<?php endif;?>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>
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
				<a href="http://www.reginalhill.com" target="blank">&copy; 2015 Web Design by Regina Riddle</a>
			</div>
		
	<div id="hammer"></div>
	</div>
</body>
</html>
<!--<?php //header('Location: /tires/admin/logoutform.php'); ?>-->

<?php
require('../includes/database_connection.php');

/*$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();*/
//require_once('includes/functions.php');

if (isset($_POST['size'])) {
	$_SESSION['size'] = $_POST['size'];
	$size = $_SESSION['size'];

}


function tiresize() {
	global $db;

	if (isset($_POST['size'])) {
		$_SESSION['size'] = $_POST['size'];
		$size = $_SESSION['size'];
		// $size=mysql_real_escape_string($size);
		// trim($size);
	}


	if (isset($size)) {
		$query = $db->prepare("SELECT size FROM tires WHERE idtires = '$size'");
		$query->execute();

		$tires = $query->fetchAll();
		if (isset($tires)) {
			echo "<ul>";
			foreach ($tires as $name) {
				echo "<li id='tiresearch'>";
				echo "Tire Size is Available: " . $name['size'];
				echo "</li>";
			}
		} else {
			
			echo "</ul>";
		}
	}
}
if (!isset($_POST['car'])) {
    $_SESSION['car'] = $_POST['car'];
  $car = $_SESSION['car'];
}
function findtire(){
  
 global $db;
  

  if (isset($_POST['car'])) {
    $_SESSION['car'] = $_POST['car'];
  $car = $_SESSION['car'];
}

 
  if (isset($car)) {
  $query = $db->prepare("SELECT idtires FROM vehicle WHERE idcarmodel = '$car'");
  $query->execute();
  $tire = $query->fetchAll();
 // var_dump($tire);
 // var_dump($query);
}
if (isset($tire)) {
      echo "<ul>";
      foreach ($tire as $name) {
        echo "<li id='tiresearch'>";
        echo "Tire Size is Available: " . $name['idtires'];
        echo "</li>";
      }echo "</ul>";
    } else {
      
      //echo "Wrong";
      //echo $_SESSION['car'];

    }
  }
//tiresize();
//include('../member/home.php');
//header('Location: ../member/home.php');

//var_dump($size);

?>