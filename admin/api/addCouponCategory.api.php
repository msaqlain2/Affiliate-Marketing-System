<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');




$validExtensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
$path = '../category_images/';
$image = $_FILES['categoryImage']['name'];
$tmpImage = $_FILES['categoryImage']['tmp_name'];

$extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

$finalImage = rand(1000, 1000000) . str_replace(" ", "", $image);
$finalImage = preg_replace('/[^A-Za-z0-9.-]/', '', $finalImage);


$category = ucwords($_POST['category']);
if(in_array($extension, $validExtensions)) { 
	$path = $path.$finalImage;
	move_uploaded_file($tmpImage, $path);

	echo (new affiliateMarketing())->addCouponCategory(
	$category = ucwords($_POST['category']),
	$finalImage
	);	
}

?>