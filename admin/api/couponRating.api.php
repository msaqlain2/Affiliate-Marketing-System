<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getStoreIdByStoreName($_POST['storeName']);


echo (new affiliateMarketing())->couponRating(
	$storesData[0]['id'],
    $_POST['rating'],
    $_SERVER['REMOTE_ADDR'],
    date('Y-m-d')
);	