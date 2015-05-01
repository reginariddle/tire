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
<!-- Place somewhere in the <head> of your document -->
<link rel="stylesheet" href="slider/woothemes-FlexSlider-ce5441b/flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="slider/woothemes-FlexSlider-ce5441b/jquery.flexslider.js"></script>
<script type="text/javascript" language="javascript">
    $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});</script>
	</head>
    
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<p>Choose a photo for your profile picture:</p>
			<input type="file" name="profile_picture" /><br />
			<input type="submit" name="submit" value="Upload file" />
		</form>

<?php

// Inspect the values PHP retrieves in $_FILES
//echo "<hr />";
//var_dump($_FILES);
//echo "<hr />";

upload_file('profile_picture');

?>
<?php 
$_FILES['name'] = ""
?>
<?php
$files = get_file_list($image_dir_path);
//display_image();

?>
<!--<h2>Images in the directory</h2>-->
<div class="flexslider">
                <?php if (count($files) == 0) : ?>
                    <p>No images uploaded.</p>
                <?php else: ?>
                    <ul class="slides">
                    <?php foreach($files as $filename) :
                        $file_url = $image_dir . '/' .
                                    $filename;
                        $delete_url = '.?action=delete&filename=' .
                                      urlencode($filename);
                    ?>
                        <li>
                            <!--<a href="<?php //echo $delete_url;?>">
                                <img src="delete.png" alt="Delete"/></a>-->
                            <a href="<?php echo $file_url; ?>">
                                <?php echo '<img src="images/'.$filename.'"/>'; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

</div>

</body></html>