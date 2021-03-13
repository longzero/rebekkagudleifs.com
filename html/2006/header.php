<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <?php
    // error_reporting(0);
    include("functions.php");
  ?>
  <title>Rebekka Guðleifsdóttir</title>
	<link rel="icon" type="image/png" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="concept.css" media="all" />
  <style type="text/css">
  <?php
  	$section = $docname;
  	if ($section != "contact" && $section != "sorry")
  	{
	  	if (isset($_GET['photo']) && isset($section))
	  	{
			  $photo = $_GET['photo'];
	  		list($width, $height) = getimagesize("photos/$section/$photo");
	  		if ($width < $height || $width == $height) $height = 500;
	  		echo "#thumbnails {height: ".$height."px; padding-top:0; padding-bottom:0;}";
	  	}
	  	else if (!isset($_GET['photo']))
	  	{
	  		if ($section == "index") {$section = "self-portraits";}
	  		$photo = getRandomPhoto("$section");
	  		list($width, $height) = getimagesize("$photo");
			  if ($width < $height || $width == $height) $height = 500;
	  		echo "#content, #thumbnails {height: ".$height."px; padding-top:0; padding-bottom:0;}";
	  		//echo "#container,#thumbnails {height: 450px;} #container {overflow:hidden;} #thumbnails {padding-top:0; padding-bottom:0;}";
	  	}
  	}
  ?>
  </style>
  <meta name="keywords" content="photography, photographer, Iceland, rebekka, gudleifsdottir, landscape, selfportraits, portraits, horses">
</head>
<body>
<div id="header">
	<h1><a href="index.php">rebekka<span style="color:#6c7347;">guðleifsdóttir</span></a></h1>
</div>
<?php //include("trackRemote.php"); ?>
<?php include("navigation.php"); ?>
