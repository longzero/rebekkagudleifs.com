<?php

	// check if a file exists and display the correct link to a photo
	function getPhoto($docname, $photo)
	{
		$defaultpath = "photos/$docname/$photo";
		$realpath = "photos/$docname/real/$photo";
		
		if (file_exists("$realpath")) $link = "$realpath";
		else $link = "$defaultpath";
		
		// $imagesize[0] = width
		// $imagesize[1] = height
		$imagesize = getPhotoSize($docname, $link);
		$width = $imagesize[0];
		$height = $imagesize[1];
		
		if ($width < $height || $width == $height)
		{
			echo "<img src='$link' height='500' alt='' />";
		}
		else
		{
			echo "<img src='$link' width='675' alt='' />";
		}
	}
	
	function getPhotoSize($docname, $photo)
	{
		$path = $photo; //"photos/$docname/$photo";
		return $imagesize = getimagesize($path);
	}

	// randomly return the path of a photo.
	function getRandomPhoto($album)
	{
		$imgPath = "photos/$album/";
		$photo = "";
		if ($handle = opendir($imgPath)) // open directory.
		{
			$photo_array = array(); // create array
			// read directory.
			while (false !== ($file = readdir($handle)))
			{
				// only jpg.
				$validFile = strcasecmp(substr($file, -4, 4), ".jpg") == 0;
				if ($validFile)
				{
					array_push($photo_array, $file); // add element to the end of array.
				}
			}
			$photo = array_rand($photo_array, 1);
			$photo = $photo_array[$photo];
			$photo = $imgPath.$photo;
			closedir($handle); // close directory.
		}
		return $photo;
	}
	

	// display all jpg files in the directory $imgPath
	function showThumbnails($category)
	{
		$imgPath = "photos/$category/thumbnails/";

  	if ($handle = opendir($imgPath)) // open directory.
  	{
    	$photo_array = array(); // create array
    
    	// read directory.
    	while (false !== ($file = readdir($handle)))
   		{
      	// only jpg.
      	$validFile = strcasecmp(substr($file, -4, 4), ".jpg") == 0;
      	if ($validFile)
      	{
      		array_push($photo_array, $file); // add element to the end of array.
      	}
    	}
    
    	natsort($photo_array); // natural sorting, the way a human would count.
    	$photo_count = count($photo_array); // count the number of elements in array.
        
    	// display everything.
    	foreach ($photo_array as $file)
    	{
    		if (isset($previousfile)) echo "<a href='$category.php?photo=$file#$previousfile' name='$file'><img src='$imgPath$file' width='190' alt='' /></a>";
    		else  echo "<a href='$category.php?photo=$file' name='$file'><img src='$imgPath$file' width='190' alt='' /></a>";
     		$previousfile = $file;
    	}
    
    	closedir($handle); // close directory.
    }
  }
  
  
  // display contact form
  function showContactForm()
  {
		echo "
		<form action='contact.php' method='post'>
			<p>
				name     <input class='field' type='text' name='name' />
				email    <input class='field' type='text' name='email' />
				website  <input class='field' type='text' name='website' value='http://' />
				location <input class='field' type='text' name='location' />
				subject  <input class='field' type='text' name='subject' />
				message
				<textarea rows='' cols='' name='message'></textarea><br />
				<input type='checkbox' name='check2' />Please check this before sending.
				<input type='submit' name='subSend' value='Send' />
			</p>
		</form>";
	}

?>