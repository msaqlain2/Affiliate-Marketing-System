<?php 
include('includes/header.inc.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();
$couponsData = $affiliateMarketing->getAllCoupons();
?>


<h2>Thanks !</h2>




<?php include('includes/footer.inc.php') ?>