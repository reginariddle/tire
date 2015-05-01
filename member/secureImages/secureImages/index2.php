<?php
	require_once('functions.php');
?>
<?php
$image_dir = 'images';
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;
?>
<html>
	<head>
		<title>File Upload</title>
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<p>Choose a photo for your profile picture:</p>
			<input type="file" name="profile_picture" /><br />
			<input type="submit" name="submit" value="Upload file" />
		</form>
<div id="vlightbox0">
<?php

// Inspect the values PHP retrieves in $_FILES
echo "<hr />";
var_dump($_FILES);
echo "<hr />";

upload_file('profile_picture');

?>
<?php 
$_FILES['name'] = ""
?>
<?php
$files = get_file_list($image_dir_path);
display_image();

?>
<h2>Images in the directory</h2>
                <?php if (count($files) == 0) : ?>
                    <p>No images uploaded.</p>
                <?php else: ?>
                    <ul>
                    <?php foreach($files as $filename) :
                        $file_url = $image_dir . '/' .
                                    $filename;
                        $delete_url = '.?action=delete&filename=' .
                                      urlencode($filename);


                    ?>
                        <a class="vlightbox0" href="<?php echo $file_url; ?>" title="<?php echo $filename; ?>"><img src="index_files/vlb_thumbnails0/<?php echo $filename; ?>" alt="<?php echo $filename; ?>"/></a>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


<!-- Start VisualLightBox.com BODY section id=0 -->

	

	
<span class="vlb"><a href="http://visuallightbox.com">lightbox jquery flv</a>by VisualLightBox.com v6.0</span>

	</div>

	<script src="index_files/vlb_engine/vlbdata0.js" type="text/javascript"></script>

	<!-- End VisualLightBox.com BODY section -->

</body>></html>