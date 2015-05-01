<?php $gal_id = $_GET["gal"]; $mygal = mygal($gal_id); $img_id = mysql_result($mygal,0,"first"); ?>
<div id="div_title"><h1><?php print $lang['gallery']; ?></h1></div>
<style type="text/css">
<!--
img { border: none !important; width: 100px !important; height: 100px !important; }
-->
</style>
<center><div id="div_overview"><h2><?php gal_name($img_id,"gallery"); ?></h2><?php thumbs($img_id); ?></div></center>