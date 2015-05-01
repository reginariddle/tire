<?php
##############################################################################
# IMGallery2: elements.php
# Template: DarkPaint (created by ncw)
# This file provides all elements which are dynamically created and are used
# in a template.
# Diese Datei stellt alle dynamisch erstellten Elemente zur Verfügung, die
# in einem Template genutzt werden.
##############################################################################

function btn_next($img_id, $template, $ssize, $lang) {
// Produces the button or element linking to the next picture.
// Erzeugt einen Button oder ein anderes Element, dass zum nächsten Bild verlinkt.
 $myimg = myimg($img_id);
 $mygal = mygal(mysql_result($myimg,0,"gallery"));
 $next = mysql_result($myimg,0,"next");
 if ($next==0) $next = mysql_result($mygal,0,"first");
 print "<a href=\"index.php?img=$next&ssize=$ssize\" tabindex=\"1\" rel=\"next\"><img src=\"templates/$template/next.gif\" width=\"35\" height=\"35\" alt=\"" . $lang['next'] . "\" /></a>";
}
function btn_prev($img_id, $template, $ssize, $lang) {
// Produces the button or element linking to the previous picture.
// Erzeugt einen Button oder ein anderes Element, dass zum vorherigen Bild verlinkt.
require "config.inc";
 $myimg = myimg($img_id);
 $mygal = mygal(mysql_result($myimg,0,"gallery"));
 mysql_connect($db_server, $db_user, $db_password);
 mysql_select_db($db_name);
 if ($img_id==mysql_result($mygal,0,"first")) $prev = mysql_result(mysql_query("SELECT * FROM `imgal2_pictures` WHERE `next` = 0"),0,"id");
 else $prev = mysql_result(mysql_query("SELECT * FROM `imgal2_pictures` WHERE `next` = $img_id"),0,"id");
 mysql_close();
 print "<a href=\"index.php?img=$prev&ssize=$ssize\" tabindex=\"2\" rel=\"prev\"><img src=\"templates/$template/prev.gif\" width=\"35\" height=\"35\" alt=\"" . $lang['back'] . "\" /></a>";
}

function gal_name($img_id,$style) {
// Outputs the galleries name.
// Gibt den Galerienamen aus.
 $myimg = myimg($img_id);
 $mygal = mygal(mysql_result($myimg,0,"gallery"));
 $gal_id = mysql_result($mygal,0,"id");
 $name = mysql_result($mygal,0,"name");
 if ($name==""||$name==NULL) $name = $lang['gallery'];
 if ($style=="gallery") print "<h2>$name</h2>";
 elseif ($style=="image") print "<h1><a href=\"index.php?gal=$gal_id\" tabindex=\"9\" rel=\"index\">$name</a></h1>";
}

function thumbs($img_id) {
// Produces the overview thumbnail-list.
// Erzeugt die Übersicht mit Thumbnails.
 $myimg = myimg($img_id);
 $mygal = mygal(mysql_result($myimg,0,"gallery"));
 $org_id = $img_id;
 $img_id = mysql_result($mygal,0,"first");
 $folder = mysql_result($mygal,0,"folder");
 do {
  $myimg = myimg($img_id);
  $mycomm = mycomm($img_id);
  $filename = mysql_result($myimg,0,"filename");
  $name = mysql_result($myimg,0,"name");
  $file = "galleries/$folder/thumbs/$filename";
  if (!file_exists($file)||filesize("$file")<1024) resize("galleries/$folder/images/$filename","galleries/$folder/thumbs/","100","100","yes","white");
  if ($img_id==$org_id) print "<a href=\"index.php?img=$img_id\"><img src=\"$file\" alt=\"$name\" width=\"90\" height=\"90\" style=\"border: #a5a5a5 5px solid;\" hspace=\"3\" vspace=\"3\" /></a>";
  elseif (mysql_num_rows($mycomm)>0) print "<a href=\"index.php?img=$img_id\"><img src=\"$file\" alt=\"$name\" width=\"94\" height=\"94\" style=\"border: #a5a5a5 3px solid;\" hspace=\"3\" vspace=\"3\" /></a>";
  else print "<a href=\"index.php?img=$img_id\"><img src=\"$file\" alt=\"$name\" width=\"100\" height=\"100\" hspace=\"3\" vspace=\"3\" /></a>";
  $img_id = mysql_result($myimg,0,"next");
 } while ($img_id != 0);
}

function image($img_id, $size) {
// Outputs the picture itself.
// Gibt das Bild selbst aus.
 require "config.inc";
 $myimg = myimg($img_id);
 $mygal = mygal(mysql_result($myimg,0,"gallery"));
 $gal_id = mysql_result($myimg,0,"gallery");
 $folder = mysql_result($mygal,0,"folder");
 $filename = mysql_result($myimg,0,"filename");
 $name = mysql_result($myimg,0,"name");
 list($width, $height) = getimagesize("galleries/$folder/images/$filename");
 $sizename = $size;
 switch ($size) {
  case small: $size = $small; break;
  case medium: $size = $medium; break;
  case big: $size = $big; break;
  case original:
   if ($width>=$height) $size = $width;
   else $size = $height;
  break;
 }
 if (!file_exists("galleries/$folder/$sizename/$filename")) {
  $size_w = $size_h = NULL;
  if ($width>=$height) $size_w = $size;
  else $size_h = $size;
  resize("galleries/$folder/images/$filename", "galleries/$folder/$sizename/", $size_w, $size_h, "no", "white");
 }
 print "<img src=\"galleries/$folder/$sizename/$filename\" alt=\"$name\" />";
}

function img_name($img_id) {
 $myimg = myimg($img_id);
 $name = mysql_result($myimg,0,"name");
 print "<h2>$name</h2>";
}

function img_navigation($img_id, $template, $ssize, $lang) {
 btn_prev($img_id, $template, $ssize, $lang);
 print " &nbsp; ";
 btn_next($img_id, $template, $ssize, $lang);
 print "<br />";
 print "<a href=\"#div_overview\" tabindex=\"3\">" . $lang['index'] . "</a>";
 print "<br />";
 print "<a href=\"index.php?img=$img_id&size=small\" tabindex=\"4\"><img src=\"templates/$template/sml.gif\" width=\"15\" height=\"15\" alt=\"" . $lang['small'] . "\" /></a> ";
 print "<a href=\"index.php?img=$img_id&size=medium\" tabindex=\"5\"><img src=\"templates/$template/med.gif\" width=\"15\" height=\"15\" alt=\"" . $lang['medium'] . "\" /></a> ";
 print "<a href=\"index.php?img=$img_id&size=big\" tabindex=\"6\"><img src=\"templates/$template/big.gif\" width=\"15\" height=\"15\" alt=\"" . $lang['big'] . "\" /></a> ";
 print "&nbsp; <a href=\"index.php?img=$img_id&size=original\" tabindex=\"7\"><img src=\"templates/$template/org.gif\" width=\"15\" height=\"15\" alt=\"" . $lang['original'] . "\" /></a> ";
 print "&nbsp; <a href=\"index.php?img=$img_id&ssize=$size\" tabindex=\"8\"><img src=\"templates/$template/sav.gif\" width=\"15\" height=\"15\" alt=\"" . $lang['save'] . "\" /></a>";
}

function img_info($img_id, $lang) {
 $myimg = myimg($img_id);
 $mygal = mygal(mysql_result($myimg,0,"gallery"));
 $gal_id = mysql_result($myimg,0,"gallery");
 $folder = mysql_result($mygal,0,"folder");
 $filename = mysql_result($myimg,0,"filename");
 $path = "galleries/$folder/images/$filename";
 $exif = exif_read_data($path,0,true);
 // Data Output
 $photographer = mysql_result($myimg,0,"photographer");
 if(!($photographer==""||$photographer==NULL)) print "<small>" . $lang['photographer'] . ":</small> $photographer<br />";
 $make = $exif["IFD0"]["Make"];
 $model = $exif["IFD0"]["Model"];
 if (substr_count($model,$make)>0) $camera = $model;
 else $camera = $make . " " . $model;
 print "<small>" . $lang['camera'] . ":</small> $camera<br />\n";
 $width = $exif["EXIF"]["ExifImageWidth"];
 $height = $exif["EXIF"]["ExifImageLength"];
 print "<small>" . $lang['resolution'] . ":</small> $width x $height<br />\n";
 $time = $exif["EXIF"]["DateTimeOriginal"];
 $time = substr($time,8,2). "." . substr($time,5,2) . "." . substr($time,0,4) . " " . $lang['comm_at'] . " " . substr($time,11,2) . ":" . substr($time,14,2);
 print "<small><abbr title=\"" .$lang['datetime_text'] ."\">" . $lang['datetime'] . "</abbr>:</small> $time\n";
  /* To display all EXIF values uncomment this command.
 foreach ($exif as $key => $section) {
  foreach ($section as $name => $val) {
   echo "$key.$name: $val<br />\n";
  }
 }*/
}

function img_comments($img_id, $ssize, $lang) {
// Outputs the comments and the addcomment-form.
// Gibt die Kommentare und das Kommentier-Formular aus.
 $mycomm = mycomm($img_id);
 if (mysql_num_rows($mycomm)>0) {
  for ($n=0; $n<mysql_num_rows($mycomm); $n++) {
   $user_id = mysql_result($mycomm,$n,"user");
   $myuser = myuser($user_id);
   // User-Details
   $user = mysql_result($myuser,0,"name");
   $email = mysql_result($myuser,0,"email");
   $homepage = mysql_result($myuser,0,"homepage");
   $place = mysql_result($myuser,0,"place");
   // Comment-Details
   $time = mysql_result($mycomm,$n,"time");
   $text = mysql_result($mycomm,$n,"text");
   // Transforming
   if ($user==NULL||$user==""||!isset($user)||$user=="Anonymous") $user == $lang['comm_anonymous'];
   if ($email==NULL||$email==""||!isset($email)) {
    $email_1 = "";
	$email_2 = "";
   } else {
    $email_1 = "<a href=\"mailto:$email\">";
	$email_2 = "</a>";
   }
   if (!($homepage==NULL||$homepage==""||!isset($homepage))) $homepage = " (<a href=\"$homepage\">" . $lang['comm_web'] . "</a>)";
   if (!($place==NULL||$place==""||!isset($place))) $place = " " . $lang['comm_from'] . " $place";
   $text = str_replace("\n","<br />\n",$text);
   $time = substr($time,8,2). "." . substr($time,5,2) . "." . substr($time,0,4) . " " . $lang['at'] . " " . substr($time,11,2) . ":" . substr($time,14,2);
   print "<p name=\"comments\" id=\"comments\" style=\"display: block;\"><small>$email_1$user$email_2$homepage$place<br /><small>$time</small></small><br />\n$text</p>\n";
  }
 } else {
  print "<p name=\"comments\" id=\"comments\" style=\"display: block;\">" . $lang['nocomments'] . "</p>\n";
 }
 print "<p><a href=\"javascript: comment_show('" . $lang['addcomment'] . "', '" . $lang['switchcomment'] . "');\" tabindex=\"10\" name=\"addcomment\" id=\"addcomment\">" . $lang['addcomment'] . "</a></p>\n";
 print "<p><form action=\"index.php?img=$img_id&ssize=$ssize&act=addcomment\" id=\"comment\" name=\"comment\" method=\"POST\" style=\"display: none;\">\n";
 if (isset($_COOKIE["imgallery2_user"])) {
  $user_id = $_COOKIE["imgallery2_user"];
  $myuser = myuser($user_id);
  if (mysql_num_rows($myuser)>0) {
   print " <input type=\"hidden\" id=\"f_hidden\" name=\"user_id\" value=\"$user_id\" />\n";
   $name = mysql_result($myuser,0,"name");
   $place = mysql_result($myuser,0,"place");
   $email = mysql_result($myuser,0,"email");
   $homepage = mysql_result($myuser,0,"homepage");
  } else { $name = $lang['comm_name']; $place = $lang['comm_place']; $email = $lang['comm_email']; $homepage = $lang['comm_homepage']; }
 } else { $name = $lang['comm_name']; $place = $lang['comm_place']; $email = $lang['comm_email']; $homepage = $lang['comm_homepage']; }
 print " <input type=\"hidden\" id=\"f_hidden\" name=\"img_id\" value=\"$img_id\" />\n";
 print " <input type=\"submit\" tabindex=\"16\" id=\"f_submit\" name=\"submit\" value=\"" . $lang['comm_send'] . "\" />\n";
 print " <input type=\"text\" tabindex=\"11\" maxlength=\"127\" id=\"f_name\" name=\"name\" value=\"$name\" svalue=\"" . $lang['comm_name'] . "\" OnFocus=\"comment_focus(this.id,this.svalue)\" OnBlur=\"comment_focusout(this.id,this.svalue)\" /><br />\n";
 print " <input type=\"text\" tabindex=\"12\" maxlength=\"127\" id=\"f_place\" name=\"place\" value=\"$place\" svalue=\"" . $lang['comm_place'] . "\" OnFocus=\"comment_focus(this.id,this.svalue)\" OnBlur=\"comment_focusout(this.id,this.svalue)\" /><br />\n";
 print " <input type=\"text\" tabindex=\"13\" maxlength=\"127\" id=\"f_email\" name=\"email\" value=\"$email\" svalue=\"" . $lang['comm_email'] . "\" OnFocus=\"comment_focus(this.id,this.svalue)\" OnBlur=\"comment_focusout(this.id,this.svalue)\" /><br />\n";
 print " <input type=\"text\" tabindex=\"14\" maxlength=\"127\" id=\"f_homepage\" name=\"homepage\" value=\"$homepage\" svalue=\"" . $lang['comm_homepage'] . "\" OnFocus=\"comment_focus(this.id,this.svalue)\" OnBlur=\"comment_focusout(this.id,this.svalue)\" /><br />\n";
 print " <textarea id=\"f_text\" tabindex=\"15\" name=\"text\" svalue=\"comment\" OnFocus=\"comment_focus(this.id,this.svalue)\" OnBlur=\"comment_focusout(this.id,this.svalue)\">" . $lang['comm_text'] . "</textarea><br />\n";
 print "<p id=\"comment_optional\" style=\"display: none;\"><small>" . $lang['optional'] . " </small></p>\n";
 print "</form></p>\n";
}

function language($currlanguage, $template) {
// Outputs the available languages.
// Gibt die verfügbaren Sprachen aus.
 $url = "index.php?" . $_SERVER['QUERY_STRING'];
 print "<form name=\"languages\" method=\"POST\" action=\"$url\" style=\"display: none;\";>\n<select name=\"setlanguage\" OnChange=\"languages.submit()\" id=\"select_languages\">\n";
 $dir = dir("languages");
 while ($langfile=$dir->read()) {
  if (!($langfile=="."||$langfile=="..")) {
   include "languages/$langfile";
   $langfile = str_replace(".php", "", $langfile);
   if ($langfile==$currlanguage) $selected = " selected=\"selected\"";
   else $selected = "";
   print "<option value=\"$langfile\"$selected>$lang_name</<option>\n";
  }
 }
 $dir->close();
 print "</select>&nbsp;</form>\n";
 print "<img id=\"exp_lang\" OnClick=\"lang_show('$template')\" src=\"templates/$template/plus.jpg\" width=\"9\" height=\"9\" />\n";
}

##############################################################################
# End of File
##############################################################################
?>
