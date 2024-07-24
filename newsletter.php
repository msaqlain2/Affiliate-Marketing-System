<?php 
include('includes/header.inc.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();
$couponsData = $affiliateMarketing->getAllCoupons();
?>



<div class="container newsletter">
    <div class=row>
        <div class="col-lg-12">
            <p>Thank you for subscribing!</p>
        </div>
    </div>
</div>


<?php include('includes/footer.inc.php') ?>



