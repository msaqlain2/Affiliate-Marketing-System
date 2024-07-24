<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');
$validExtensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
$path = '../category_images/';

$oldImage = $_POST['oldCategoryImage'];

$newImage = $_FILES['categoryImage']['name'];
$tmpImage = $_FILES['categoryImage']['tmp_name'];
$category = ucwords($_POST['category']);
if($newImage != '') {
	$extension = strtolower(pathinfo($newImage, PATHINFO_EXTENSION));
	$finalImage = rand(1000,1000000).$newImage;
	if(!in_array($extension, $validExtensions)){
		echo $affiliateMarketing->failedResponseFunction('Invalid Image Format' , '');
	}
	else {
		$path = $path.$finalImage;
		move_uploaded_file($tmpImage, $path);
	}

}
else if($newImage == '') {
	$finalImage = $oldImage;
}

	echo (new affiliateMarketing())->updateCouponCategory(
	$_POST['id'],
	$category,
	$finalImage
	);



?>