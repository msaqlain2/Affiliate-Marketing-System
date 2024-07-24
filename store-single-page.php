<?php 

$couponsData = $affiliateMarketing->getCouponsByStoreName($store[0]['store_name']);
$similarStores = $affiliateMarketing->getSmimilarStores($store[0]['store_categories'], $store[0]['store_name']);
$ratingData = $affiliateMarketing->getRatingByIpAndStoreName(ucwords(SUBSTR(str_replace("-", " ", $_GET['product_name']), 0,-4)),$_SERVER['REMOTE_ADDR']); 
$votesData = $affiliateMarketing->getStoreByName(ucwords(SUBSTR(str_replace("-", " ", $_GET['product_name']), 0,-4)));
$couponCount = count($couponsData); 
?>

 <div id="store-detail">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="store-profile">
          <div class="offers-wrapper">
            <div class="flex-responsive">
              <div class="store-image-flex showResponse">
                <div class="storeLogo">
                  <a target="_blank" href="#">
                    <div class="web_imagebox">
                      <img src="<?= BASE_URL.'admin/store_images/'.$store[0]['featured_image'] ?>" alt="<?= ucwords(SUBSTR($_GET['product_name'], 0,-4)) ?>" class="img-fluid">
                    </div>
                  </a>
                </div>
              </div>
              <div class="flex-title-store">
                <?php
                  $categoryName = strtolower($store[0]['category']);
                  
                  $url = BASE_URL.'categories/'.urlencode($categoryName);

                  ?>
                <h1> <?php echo $store[0]['store_name']; 
                
                
                  // Set the timezone
                  date_default_timezone_set('UTC');
                  
                  // Get the current month and year
                  $current_month = date('F');
                  $current_year = date('Y');
                  
                  // Display the current month and year
                  echo "  Coupons & Promo Codes $current_month $current_year.";
                ?>
                 </h1>
                                <div class="store-breadcrumbs">
                  <ul>

                    <?php ?>
                    <li class="ddhide"><a href="../">Home</a></li>
                    <li class="ddhide"><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                        <li><a href="<?php echo $url ?>"><?php echo $store[0]['category'] ?></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                    <li><a href="<?php $url ?>" class="action-disabled"><?php echo $store[0]['store_name'] ?></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <?php if(empty($couponsData)): ?>
            <h4><?php echo $store[0]['store_name'] ?> have no coupon(s)</h4>
          <?php endif ?>
            <?php foreach($couponsData as $coupons):?>
            <div class="main-coupon">
              <div class="col-md-2 col-sm-12 col-xs-12">
                <a href="<?= $store[0]['website_url'] ?>" target="_blank" class="copycodebtn" data-id="2" data-clipboard-text=" ">
                  <div class="store web_imagebox">
                    <img src="<?= BASE_URL.'admin/store_images/'.$store[0]['featured_image'] ?>" alt="<?= ucwords(SUBSTR($_GET['product_name'], 0,-4)) ?>" class="img-fluid lazy">
                  </div>
                </a>
              </div>

              <div class="col-md-7 col-sm-12 col-xs-12">
                <h3>
                  <a href="<?= $store[0]['website_url'] ?>" target="_blank"><?= $coupons['title'] ?></a>
                </h3>
                <p class="lessContent show-read-more"><?= $coupons['description'] ?></p>

                <?php 

                $expiryDate = $coupons['expiry_date'];
              $formattedDate = date("F d, Y", strtotime($expiryDate));

                ?>
                <span class="coupon-expire-date">Will Expire on: <?= $formattedDate; ?></span>
                <span class="totalViews">
                  <strong><?= $coupons['click_count'] ?></strong> Times Used </span>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12 coupon-code-main-container">
  <a class="couponClickCountIndexPage" data-coupon-code="<?= $coupons['code'] ?>" onclick="countClickIndex(<?= $coupons['id'] ?>)" href="<?= $coupons['website_url'] ?>" target="_blank">
    <div class="barcode-image " >
      <span class="verified-coupon-container">Verified Coupon</span>
      <span id="coupon-code-placeholder" style="color:#000">Click to reveal coupon code</span>
    </div>
  </a>
</div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="store-info">
            <div class="storeTopContainer">
              <div class="storeLogo responsehide">
                <a href="<?= $store[0]['website_url'] ?>" target="_blank" class="copycodebtn" data-id="2" data-clipboard-text=" ">
                  <div class="store web_imagebox">
                    <img src="<?= BASE_URL.'admin/store_images/'.$store[0]['featured_image'] ?>" alt="<?= ucwords(SUBSTR($_GET['product_name'], 0,-4)) ?>" class="img-fluid lazy">
                  </div>
                </a>
              </div>
              <div class="rating-stars responsehide">
                <ul id="stars" data-store-id="1">
                  <li class="star selected" title="Poor" data-value="1">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="star selected" title="Fair" data-value="2">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="star selected" title="Good" data-value="3">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="star selected" title="Excellent" data-value="4">
                    <i class="fa fa-star"></i>
                  </li>
                  <li class="star selected" title="WOW!!!" data-value="5">
                    <i class="fa fa-star"></i>
                  </li>
                </ul>
                <p id="counterVotesAndRating"> <?php echo empty($ratingData) ? '0' : $ratingData[0]['rating']?> Rating, <?php echo $votesData[0]['votes'] ?> Votes </p>
                <p class="successRating"></p>
              </div>
              <a class="btn btn-blue responsehide" target="_blank" href="<?php echo $store[0]['website_url'] ?>">
                <strong>
                  <span>Visit <?php echo $store[0]['store_name'] ?> <i class="fa fa-external-link"></i>
                  </span>
                </strong>
              </a>
              <div class="about-store">
                <p><?php echo $store[0]['description'] ?></p>
              </div>
              <!--<hr>-->
              <!--<p class="submit-coupnbtn">Submit a Coupon <i class="fa fa-tag"></i>-->
              <!--</p>-->
              <!--<hr>-->
              <!--<p class="submit-coupnbtn">Submit a Coupon <i class="fa fa-tag"></i>-->
              <!--</p>-->
              <hr>
              <div class="box single">
              <!--  <h2 class="title"><?php echo ucwords(SUBSTR($_GET['product_name'], 0,-4)) ?> Offers</h2>-->
                <ul class="about-stores-counts">
                  <li>
                    <span class="prop">Total Offers:</span>
                    <strong><?php echo $couponCount; ?></strong>
                  </li>
                  <li>
                    <span class="prop">Coupon Codes:</span>
                    <strong><?php echo $couponCount; ?></strong>
                  </li>
                  <li>
                    <span class="prop">Votes Rating: </span>
                    <strong><?php echo $votesData[0]['votes'] ?></strong>
                  </li>
                </ul>
              </div>
              <div class="box single">
                <div class="title">Related Categories</div>
                <div class="store-description">
                  <ul class="ls-list store">
                    <?php if(!empty($store[0]['category'])):?>
                    <li>
                        <?php
                            $categoryName = strtolower($store[0]['category']);
                    $categoryName = preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryName);
                    $url = BASE_URL . "categories/". $categoryName; 
                        ?>
                      <a href="<?php echo $url ?>"><?php echo $store[0]['category'] ?></a>
                    </li>
                    <?php endif ?>
                  </ul>
                </div>
              </div>
              <div class="box single">
                <h2 class="title">Similar Stores</h2>
                <ul class="ls-list store">

                  <?php 
                  if(!empty($similarStores)):
                  foreach($similarStores as $similarStore): 
                    $storeName = strtolower($similarStore['store_name']);
                    $storeName = preg_replace('/[^A-Za-z0-9-]+/', '-', $storeName);
                    $url = BASE_URL . "stores/". $storeName; 
                  ?>
                  <li>
                    <a href="<?= $url ?>"><?= $similarStore['store_name'] ?></a>
                  </li>
                  <?php 
                endforeach; 
                endif;?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.inc.php') ?>
<div id="useOfCouponPopup" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
<div id="addOfferModal" class="modal " role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close popup-closebtn" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">
          <i class="fa fa-tag"></i> Submit a coupon of 121 Workwear and help others to save!
        </h2>
        <form action="#" class="submit-form" form-type="addOffer" method="post" accept-charset="utf-8">
          <input type="hidden" name="_token" value="689c4a1f7e0a6a5df270116fba5a3f7b" />
          <div class="success_response"></div>
          <div class="form-group custom flex paddingBottom20 border-bottom-grey">
            <label for="store_site">Store Website</label>
            <input type="text" id="store_site" class="form-control" name="merchant_site" value="121workwear.com" disabled>
          </div>
          <input type="hidden" value="1" name="merchant_id">
          <div class="parent_group">
            <div class="form-group custom offer_title_group">
              <label for="offer_title">Offer Title*</label>
              <input type="text" id="offer_title" class="form-control" name="offer_title" placeholder="20% off Sitewide ...">
            </div>
            <div class="form-group custom">
              <label for="offer_code">Code</label>
              <input type="text" id="offer_code" class="form-control" name="offer_code" placeholder="Offer Code... (optional)">
            </div>
          </div>
          <div class="form-group custom">
            <label for="offer_desc">Discount Description</label>
            <textarea name="offer_desc" id="offer_desc" class="form-control" placeholder="Terms, restrictions, or other helpful comments (optional)"></textarea>
          </div>
          <div class="form-group custom ">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" />
          </div>
          <div class="result_box_offer"></div>
          <button type="submit" class="btn btn-add-offer form-loading">Submit Offer</button>
        </form>
        <p class="submit_detail">Please only submit publicly available coupon codes and not private or internal company codes. When in doubt, please obtain permission from the store first. See our Terms and Conditions for more information regarding user generated content. Thank you very much!</p>
      </div>
    </div>
  </div>
</div>
