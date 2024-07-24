<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');

$validExtensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
$path = '../banner_image/';
$image = $_FILES['bannerImage']['name'];
$tmpImage = $_FILES['bannerImage']['tmp_name'];



$extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

$finalImage = rand(1000, 1000000) . str_replace(" ", "", $image);
$finalPath = $path . strtolower($finalImage);
$path = $finalPath;

if(in_array($extension, $validExtensions)) { 
	// Use $finalPath instead of $path for the final image path
	move_uploaded_file($tmpImage, $finalPath);

	echo (new affiliateMarketing())->updateBannerImage(
		$path
	);	
}





?>