<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();

 $couponStore = isset($_POST['couponStore']) ? $_POST['couponStore'] : '';
 $couponTitle = $_POST['couponTitle'];
 $description = $_POST['description'];
 $affiliateLink = $_POST['affiliateLink'];
 $couponCode = $_POST['couponCode'];
 $expiryDate = $_POST['expiryDate'];
 $couponOrder = isset($_POST['couponOrder']) ? $_POST['couponOrder'] : NULL;
 $category = isset($_POST['category']) ? $_POST['category'] : '';
 $hotStory = isset($_POST['hotStory']) ? $_POST['hotStory'] : 0;
 
 if($couponStore == ''){
     echo $affiliateMarketing->failedResponseFunction('store', '');
 }
 
 else if($category == ''){
     echo $affiliateMarketing->failedResponseFunction('category', '');
 }

else{

    echo (new affiliateMarketing())->addCoupon(
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

}
