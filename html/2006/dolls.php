<?php include("header.php"); ?>
<div id="container">
	<div id="photo">
		<?php
			if (isset($_GET['photo']))
			{
				$photo = $_GET['photo'];
				getPhoto($docname, $photo);
			}
			else
			{
				//$photo = getRandomPhoto("$docname");
				$imagesize = getPhotoSize($docname, $photo);
				$width = $imagesize[0];
				$height = $imagesize[1];
		
				if ($width < $height || $width == $height)
				{echo "<img src='$photo' height='500' alt='' />";}
				else {echo "<img src='$photo' width='675' alt='' />";}
			}
		?>
	</div>
	<div id="thumbnails">
		<?php showThumbnails($docname); ?>
	</div>
</div>
<?php include("footer.php"); ?>