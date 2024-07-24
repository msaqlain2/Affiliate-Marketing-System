<?php 
include('includes/header.inc.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();
$couponsData = $affiliateMarketing->getAllCoupons();
$bannerImage = $affiliateMarketing->getBannerImage();

?>

<style>
    .container-fluid.header-banner
{
  background-image: url('<?php echo 'admin/banner_image/'.$bannerImage['0']['banner_image'] ?>');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  min-height: 400px;
}


@media(width:768px)
{
    .container-fluid.header-banner
    {
        min-height: 350px;
    }
}


@media(width:1024px)
{
    .container-fluid.header-banner
    {
        min-height: 400px;
    }
}

@media(max-width:425px)
{
    .container-fluid.header-banner
    {
        min-height: 200px;
    }
    .icon-addon.addon-lg .form-control {
    font-size: 12px;
}

</style>




<div class="container-fluid header-banner">
  <div class="row">
    <div class="col-lg-12">
      
    </div>
  </div>
</div>
 
<div id="topstore">
  <div class="container">
    <h3>Top Stores by <span>Verified Saver</span></h3>
    <div class="row">
      <?php foreach($storesData as $store):
        $storeName = strtolower($store['store_name']);
        $storeName = preg_replace('/[^A-Za-z0-9-]+/', '-', $storeName);
        $url = BASE_URL . "stores/". $storeName; 
        if($store['is_hot_story'] == 1):
      ?> 
      <div class="col-md-2">
        <a href="<?= $url ?>">
          <div class="store web_imagebox">
            <img src="admin/store_images/<?= $store['featured_image'] ?>" alt="<?= $store['store_name'] ?>" class="img-fluid lazy">
          </div>
        </a>
          <a class="storename" href="<?= $url ?>"><?= $store['store_name'] ?></a>
      </div>
    <?php 
    endif;
    endforeach; ?>
    </div>
  </div>
</div>

<div id="coupon-listing-home">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-12">
        <h1 class="section-title">Latest Coupons, Promo Codes and Coupon Codes</h1>   
           </div>
    </div>
   <?php foreach($couponsData as $coupon): 
    $expiryDate = $coupon['expiry_date'];
    $formattedDate = date("F d, Y", strtotime($expiryDate));
    $storeCoupons = strtolower($coupon['store_name']);
    $storeCoupons = preg_replace('/[^A-Za-z0-9-]+/', '-', $storeCoupons);
    $url = BASE_URL . "stores/". $storeCoupons; 
    if($coupon['coupon_hot_story'] == 1):
    ?>
  <div class="row">
    <div class="col-lg-12">     
      <div class="main-coupon">
        <div class="col-md-2 col-sm-12 col-xs-12">
          <a href="<?= $url ?>">    <div class="store web_imagebox">
              <img src="admin/store_images/<?= $coupon['featured_image'] ?>" alt="Aspinal Of London-SmartsSaving" class="img-fluid lazy">
            </div>
            </a>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
          <h3><a href="<?= $coupon['website_url'] ?>" target="_blank"><?= $coupon['title'] ?></a></h3>
          <p class="lessContent show-read-more"><?= $coupon['title'] ?></p>
          <span class="coupon-expire-date">Will Expire on:  <?= $formattedDate; ?></span>
          <span class="totalViews">
          <strong><?= $coupon['click_count'] ?></strong> Times Used</span>
          <a href="<?= $url ?>">List of<span><strong> <?= $coupon['store_name'] ?></strong> </span>Coupons</a>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 coupon-code-main-container">
      <a class="couponClickCountIndexPage" data-coupon-code="<?= $coupon['code'] ?>" onclick="countClickIndex(<?= $coupon['coupon_id'] ?>)" href="<?= $coupon['website_url'] ?>" target="_blank">
    <div class="barcode-image" >
      <span class="verified-coupon-container">Verified Coupon</span>
      <span id="coupon-code-placeholder" style="color:#000">Click to reveal coupon code</span>
    </div>
  </a>
</div>
      </div>  
    </div>
  </div>
  <?php endif; ?>
  <?php endforeach; ?>



  </div>
</div>
<?php include('includes/footer.inc.php') ?>