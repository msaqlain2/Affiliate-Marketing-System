<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$hotStory = isset($_POST['hotStory']) ? $_POST['hotStory'] : 0;

$validExtensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
$path = '../store_images/';

$oldImage = $_POST['oldFeaturedImage'];

$newImage = $_FILES['featuredImage']['name'];
$tmpImage = $_FILES['featuredImage']['tmp_name'];

if($newImage != '') {
	$extension = strtolower(pathinfo($newImage, PATHINFO_EXTENSION));
	$finalImage = rand(1000,1000000).$newImage;
	if(!in_array($extension, $validExtensions)){
		echo $affiliateMarketing->failedResponseFunction('Invalid Image Format' , '');
	}
	else {
		$path = $path.strtolower($finalImage);
		move_uploaded_file($tmpImage, $path);
	}

}
else if($newImage == '') {
	$finalImage = $oldImage;
}

	echo (new affiliateMarketing())->updateStore(
	$_POST['id'],
	$_POST['storeName'],
	$_POST['storeCategories'],
	$_POST['websiteUrl'],
	$_POST['affiliateLink'],
	$finalImage,
	$_POST['description'],
	$_POST['expiryDate'],
	$hotStory

	);	





?>