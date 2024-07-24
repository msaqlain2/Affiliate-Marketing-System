<?php

header('Access-Control-Allow-Origin: https://example.com');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
if (!isset($_SESSION)) {
    session_start();
}



require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$coupon = $affiliateMarketing->getAllCouponsForClicksCount($_POST['id']);
$currentCount = $coupon[0]['click_count'];

$newCount = $currentCount+1;

echo (new affiliateMarketing())->updateCouponClickCount(
    $_POST['id'],
    $newCount
);

