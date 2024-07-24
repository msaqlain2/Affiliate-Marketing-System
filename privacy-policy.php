<?php 
include('includes/header.inc.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();
$couponsData = $affiliateMarketing->getAllCoupons();
$card1 = $affiliateMarketing->getPrivacyPolicy1();
$card2 = $affiliateMarketing->getPrivacyPolicy2();
$card3 = $affiliateMarketing->getPrivacyPolicy3();
$card4 = $affiliateMarketing->getPrivacyPolicy4();
?>




 <div class="aboutContainer">
  <div class="container">
    <div class="row">

            <div class="col-md-6">
        <div class="contentContainer">
          <h3><?php echo $card1['0']['heading'] ?></h3>
<p><?php echo nl2br(htmlspecialchars($card1['0']['description'])) ?></p>
       </div>
      </div>
      
            <div class="col-md-6">
        <div class="contentContainer">
          <h4><?php echo $card2['0']['heading'] ?></h4>
<p><?php echo nl2br(htmlspecialchars($card2['0']['description'])) ?></p>
   
     </div>
      </div>
      
            <div class="col-md-6">
        <div class="contentContainer">
          <h5><?php echo $card3['0']['heading'] ?></h5>
<p><?php echo nl2br(htmlspecialchars($card3['0']['description'])) ?></p>
<p>
  </div>
      </div>
      
            <div class="col-md-6">
        <div class="contentContainer">
          <h6><?php echo $card4['0']['heading'] ?></h6>
<p><?php echo nl2br(htmlspecialchars($card4['0']['description'])) ?></p>

      </div>
      </div>
      

    </div>
  </div>
</div>


<?php include('includes/footer.inc.php') ?>