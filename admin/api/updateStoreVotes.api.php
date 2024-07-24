<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getStoreIdByStoreName($_POST['storeName']);

$votes = $storesData[0]['votes']+1;
echo (new affiliateMarketing())->updateStoreVotes(
	$storesData[0]['id'],
    $votes
);	

echo json_encode(array('newVotes'=>$votes));