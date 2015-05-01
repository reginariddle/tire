<?php $img_id = $_GET["img"]; $size = $_GET["size"]; $ssize = $_GET["ssize"]; if (!isset($ssize)) $ssize = "medium"; if (!isset($size)) $size = $ssize; ?>
<div id="div_title"><?php gal_name($img_id,"image");?></div>
<?php if(!isset($img_id)) $img_id = 1; ?>
<div class="2spalten">
 <div id="div_image"><?php img_name($img_id); print "\n"; image($img_id, $size); print "\n"; ?></div>
 <div id="div_navigation"><?php print "<h2>" . $lang['navigation'] . "</h2>"; img_navigation($img_id, $template, $ssize, $lang); ?></div>
 <div id="div_info"><?php print "<h2>" . $lang['information'] . "</h2>"; img_info($img_id, $lang); ?></div>
 <div id="div_comments"><?php print "<h2>" . $lang['comments'] . "</h2>"; img_comments($img_id, $ssize, $lang); ?></div>
</div>
<center><div id="div_overview"><?php print "<h2>" . $lang['overview'] . "</h2>"; thumbs($img_id); ?></div></center>
<div id="div_copy">IMGallery [ v 2.0 (beta) | &copy; 2006 | <a href="http://www.offen-siv.de/imgallery2/">Nico Wiedemann</a> ]</div>