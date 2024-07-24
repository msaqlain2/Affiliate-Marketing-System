<?php 
include('includes/header.inc.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();
$couponsData = $affiliateMarketing->getAllCoupons();
$aboutUs = $affiliateMarketing->getAboutUs();
?>





<div id="about">
<div class="container">
    <h1>About Us</h1>
    <div class="text-box">
        	<p><?php echo nl2br(htmlspecialchars($aboutUs['0']['about_us'])) ?></p>
</div>
</div>

<?php include('includes/footer.inc.php') ?>