<?php
##############################################################################
# IMGallery2: tools.php
# This file provides all elements which are dynamically created.
# Diese Datei stellt alle dynamisch erstellten Elemente zur Verfügung.
##############################################################################

function resize($filename,$outputdir,$max_width,$max_height,$squared,$bgcol) {

	if ($squared==NULL) { $squared = "yes"; }
	
	list($orig_width, $orig_height) = getimagesize($filename);
	$width = $orig_width;
	$height = $orig_height;
	
	if ($sqsz!=NULL) {
	 $max_height = $sqsz;
	 $max_width = $sqsz;
	}
	
	if ($squared=="yes") {
	 if ($max_height==NULL) {
	  if ($max_width!=NULL) {
	   $max_height = $max_width;
	  } else {
	   $max_height = $stdsize;
	  }
	 }
	
	 if ($max_width==NULL) {
	  if ($max_height!=NULL) {
	   $max_width = $max_height;
	  } else {
	   $max_width = $stdsize;
	  }
	 }
	} else {
	 if ($max_height==NULL) {
	  if ($max_width!=NULL) {
	   $max_height = ($max_width*$height/$width);
	  } else {
	   $max_height = $stdsize;
	  }
	 }
	
	 if ($max_width==NULL) {
	  if ($max_height!=NULL) {
	   $max_width = ($max_height*$width/$height);
	  } else {
	   $max_width = $stdsize;
	  }
	 }
	}
	
	if (($orig_height/$orig_width)<1) {
	 // wider than tall / breiter als hoch
	 $new_height = ($max_width*$height/$width);
	 $xoff = 0;
	 $yoff = (($max_height-$new_height)/2);
	 $height = $new_height;
	 $width = $max_width;
	} elseif (($orig_height/$orig_width)>1) {
	 // taller than wide / hoeher als breit
	 $new_width = ($max_height*$width/$height);
	 $xoff = (($max_width-$new_width)/2);
	 $yoff = 0;
	 $height = $max_height;
	 $width = $new_width;
	} else {
	 // squared / quadratisch
	 $xoff = 0;
	 $yoff = 0;
	 $height = $max_height;
	 $width = $max_width;
	}
	
	// Some colors for the bgcol-option.
	// Einige Farben für die bgcol-Option.
	// Umrechner Hex-Dez: http://www.computerleben.net/tools/hex_dezimal.php
	// bgcol ist Hintergrundfarbe, Uebergeben wird bg mit den Faellen hier:
	
	$image_p = imagecreatetruecolor($max_width, $max_height);
	switch($bgcol) {
	 case "white":
	 $bgcol = ImageColorAllocate( $image_p, "255", "255", "255");
	 break;
	 case "black":
	 $bgcol = ImageColorAllocate( $image_p, "0", "0", "0");
	 break;
	 case "silver":
	 $bgcol = ImageColorAllocate( $image_p, "192", "192", "192");
	 break;
	 case "gray":
	 $bgcol = ImageColorAllocate( $image_p, "80", "80", "80");
	 break;
	 case "red":
	 $bgcol = ImageColorAllocate( $image_p, "255", "0", "0");
	 break;
	 case "green":
	 $bgcol = ImageColorAllocate( $image_p, "0", "255", "0");
	 break;
	 case "blue":
	 $bgcol = ImageColorAllocate( $image_p, "0", "0", "255");
	 break;
	 case "yellow":
	 $bgcol = ImageColorAllocate( $image_p, "255", "255", "0");
	 break;
	 case "lfvyel":
	 $bgcol = ImageColorAllocate( $image_p, "255", "223", "0");
	 break;
	 case "stud_c7":
	 $bgcol = ImageColorAllocate( $image_p, "199", "199", "199");
	 break;
	 case "stud_e5":
	 $bgcol = ImageColorAllocate( $image_p, "229", "229", "229");
	 break;
	 case "stud_65":
	 $bgcol = ImageColorAllocate( $image_p, "65", "65", "65");
	 break;
	 default:
	 $bgcol = ImageColorAllocate( $image_p, "255", "255", "255");
	 break;
	}
	imagefill($image_p, 1, 1, $bgcol);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, $xoff, $yoff, 0, 0,$width, $height, $orig_width, $orig_height);
	
	// Ausgabe in Datei
	
	if ($outputdir == "temp") {
	 header("Content-Type: image/jpeg");
	 imagejpeg($image_p,"",100);
	} else {
	 if (!is_dir($outputdir)) { mkdir($outputdir); chmod($outputdir,0777); }
	 $saveas = $outputdir . basename($filename);
	 imagejpeg($image_p,$saveas,95);
	 chmod($saveas,0777);
	}

}

function mygal($gal_id) {
// Provides all MySQL-functions for a gallery.
// Bietet alle MySQL-Funktionen für eine Galerie.
 require "config.inc";
 mysql_connect($db_server, $db_user, $db_password);
 mysql_select_db($db_name);
 $mysql = mysql_query("SELECT * FROM `imgal2_galleries` WHERE `id` = $gal_id");
 mysql_close();
return $mysql; }

function myimg($img_id) {
// Provides all MySQL-functions for a picture.
// Bietet alle MySQL-Funktionen für ein Bild.
 require "config.inc";
 mysql_connect($db_server, $db_user, $db_password);
 mysql_select_db($db_name);
 $mysql = mysql_query("SELECT * FROM `imgal2_pictures` WHERE `id` = $img_id");
 mysql_close();
return $mysql; }

function mycomm($img_id) {
// Provides all MySQL-functions for a picture.
// Bietet alle MySQL-Funktionen für ein Bild.
 require "config.inc";
 mysql_connect($db_server, $db_user, $db_password);
 mysql_select_db($db_name);
 $mysql = mysql_query("SELECT * FROM `imgal2_comments` WHERE `image` = $img_id ORDER BY `time` ASC");
 mysql_close();
return $mysql; }

function myuser($user_id) {
// Provides all MySQL-functions for a picture.
// Bietet alle MySQL-Funktionen für ein Bild.
 require "config.inc";
 mysql_connect($db_server, $db_user, $db_password);
 mysql_select_db($db_name);
 $mysql = mysql_query("SELECT * FROM `imgal2_users` WHERE `id` = $user_id");
 mysql_close();
return $mysql; }

function addcomment() {
 $img_id = $_POST["img_id"];
 $user_id = $_POST["user_id"];
 $text = $_POST["text"];
 $name = $_POST["name"];
 $email = $_POST["email"];
 $homepage = $_POST["homepage"];
 $place = $_POST["place"];
 // Transform 
 $text = htmlspecialchars($text,ENT_QUOTES);
 $text = nl2br($text);
 $name = htmlspecialchars($name,ENT_QUOTES);
 if (substr_count($email,"@")==0) $email = NULL;
 if (substr_count($homepage,"http://")==0) $homepage = "http://" . $homepage;
 $ip = getenv("REMOTE_ADDR");
 $time = date("Y-m-d H:i:s");
 // Compare to cookie-saved user
 if (!($user_id==NULL||$user_id==""||!isset($user_id))) {
  $myuser = myuser($user_id);
  $u_name = mysql_result($myuser,0,"name");
  $u_place = mysql_result($myuser,0,"place");
  $u_email = mysql_result($myuser,0,"email");
  $u_homepage = mysql_result($myuser,0,"homepage");
  if ($u_name==$name&&$u_place==$place&&$u_email==$email&&$u_homepage==$homepage) $checked = TRUE;
 }
 require "config.inc";
 mysql_connect($db_server, $db_user, $db_password);
 mysql_select_db($db_name);
 if ($name==""||$name=="name"||$name==NULL) {
  $user = 1;
 } elseif (isset($user_id)&&$checked) {
  $user = $user_id;
 } else {
  mysql_query("INSERT INTO `imgal2_users` ( `id` , `name` , `email` , `homepage` , `place` ) VALUES (NULL , '$name', '$email', '$homepage', '$place');");
  $user = mysql_insert_id();
  setcookie("imgallery2_user", $user);
 }
 $mycomm = mysql_query("SELECT * FROM `imgal2_comments` WHERE `image` = $img_id");
 for ($n = 0; $n < mysql_num_rows($mycomm); $n++) {
  $c_image = mysql_result($mycomm,$n,"image");
  $c_user = mysql_result($mycomm,$n,"user");
  $c_ip = mysql_result($mycomm,$n,"ip");
  $c_text = mysql_result($mycomm,$n,"text");
  if ($c_image==$img_id&&$c_user==$user&&$c_ip==$ip&&$c_text==$text) { mysql_close(); return NULL; }
 }
 mysql_query("INSERT INTO `imgal2_comments` ( `id` , `image` , `time` , `user` , `ip` , `text` ) VALUES (NULL , '$img_id', '$time', '$user', '$ip', '$text');");
 mysql_close();
}

?>
