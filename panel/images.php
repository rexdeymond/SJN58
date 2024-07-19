<?php
// The file
$f=$_GET['f'];

// Content type
if(substr($f,strlen($f)-4,strlen($f))==".png")
	header('Content-type: image/png');
else
	header('Content-type: image/jpeg');

// Get new dimensions
list($w_orig, $h_orig) = getimagesize($f);

$w=isset($_GET['w'])?$_GET['w']:$w_orig;
$h=isset($_GET['h'])?$_GET['h']:$h_orig;

$ratio_orig = $w_orig/$h_orig;

// Keep Aspec Ratio
$r=isset($_GET['r'])?$_GET['r']:1;

if($r==1)
	if ($w/$h > $ratio_orig) {
	   $w = $h*$ratio_orig;
	} else {
	   $h = $w/$ratio_orig;
	}

// Resample
$image_p = imagecreatetruecolor($w, $h);

if(substr($f,strlen($f)-4,strlen($f))==".png")
	$image = imagecreatefrompng($f);
else
	$image = imagecreatefromjpeg($f);

//imagecopyresampled($image_p, $image, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
imagecopyresized($image_p, $image, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);

// Output
if(substr($f,strlen($f)-4,strlen($f))==".png")
	imagepng($image_p);
else
	imagejpeg($image_p);
?> 
