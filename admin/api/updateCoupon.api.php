<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../models/affiliateMarketing.class.php');

$couponStore = ucwords($_POST['couponStore']);
$couponTitle = $_POST['couponTitle'];
$description = $_POST['description'];
$affiliateLink = $_POST['affiliateLink'];
$couponCode = $_POST['couponCode'];
$expiryDate = $_POST['expiryDate'];
$category = $_POST['category'];
$couponOrder = isset($_POST['couponOrder']) ? $_POST['couponOrder'] : NULL;
$hotStory = isset($_POST['hotStory']) ? $_POST['hotStory'] : 0;


echo (new affiliateMarketing())->updateCoupon(
    $_POST['id'],
    $couponStore,
    $couponTitle,
    $description,
    $affiliateLink,
    $couponCode,
    $expiryDate,
    $category,
    $hotStory,
    $couponOrder
);

?>
