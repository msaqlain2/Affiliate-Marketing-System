<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');


echo (new affiliateMarketing())->addSubCategory(
	$_POST['category'],
	$_POST['subCategory']
);


?>