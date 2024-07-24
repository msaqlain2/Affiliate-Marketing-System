<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');

$hotStory = isset($_POST['hotStory']) ? $_POST['hotStory'] : 0;


$validExtensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
$path = '../store_images/';
$image = $_FILES['featuredImage']['name'];
$tmpImage = $_FILES['featuredImage']['tmp_name'];



$extension = pathinfo($image, PATHINFO_EXTENSION);

$finalImage = rand(1, 100) . str_replace(" ", "", $image);

$storeName = $_POST['storeName'];
if(in_array($extension, $validExtensions)) { 
	$path = $path.$finalImage;
	move_uploaded_file($tmpImage, $path);

	echo (new affiliateMarketing())->addStore(
	$storeName,
	$_POST['storeCategories'],
	$_POST['websiteUrl'],
	$_POST['affiliateLink'],
	$finalImage,
	$_POST['description'],
	$_POST['expiryDate'],
	$hotStory

	);	
}




?>