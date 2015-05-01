<?php require "config.inc";
      require "tools.php";
      $template = "darkpaint";
      $language = $_POST["setlanguage"];
      if (isset($language)) setcookie("imgallery2_language", $language);
      elseif (isset($_COOKIE["imgallery2_language"])) $language = $_COOKIE["imgallery2_language"];
      else $language = "de";
      include "templates/$template/elements.php"; 
      include "languages/$language.php";
      $action = $_GET["act"]; 
      if ($action=="addcomment") addcomment(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IMGallery 2.0</title>
<!-- Obligatorische META-Tags, wie charset, etc. -->
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="imgal2.js"></script>
<!-- Dynamische META-Tags, wie Seitenbeschreibung, etc. -->
<?php 
print "<link rel=\"stylesheet\" media=\"all\" href=\"templates/$template/$template.css\" />\n";
print "<link rel=\"stylesheet\" media=\"print\" href=\"templates/print/print.css\" />\n";
?>
</head>
<body id="body" text="#A5A5A5" link="#A5A5A5" vlink="#A5A5A5" alink="#A5A5A5">
<?php
if (isset($_GET["gal"])) include "templates/$template/viewgallery.php";
elseif (isset($_GET["img"])) include "templates/$template/viewimage.php";
else  include "templates/$template/viewgalleries.php";
?>
<div id="div_language"><?php language($language, $template); ?></div>
</body>
</html>