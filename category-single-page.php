<div id="store-detail">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="store-profile">
          <div class="offers-wrapper">
            <div class="flex-responsive">
             
              <?php if(!empty($categoriesData)): ?>
              <div class="flex-title-store">
                <h1><?php echo $categoriesData[0]['category_name'] ?> Coupons & Promo Codes <?php echo date('F Y'); ?> </h1>
                <br />
                <h2 style="font-size:20px;font-weight:700"><?php echo "Top ". $categoriesData[0]['category_name']."'s Offers"?></h2>
                
              </div>
              <?php endif; ?>
              <?php if(empty($categoriesData)): 
              ?>
                <h1><?php echo ucwords(str_replace('-', ' ' ,substr($_GET['category_name'],0,-4))) ?> Coupons & Promo Codes <?php echo date('F Y') ?></h1>
                <br />
                 <h4 style="font-size:20px;font-weight:700"><?php echo ucwords(str_replace('-', ' ' ,substr($_GET['category_name'],0,-4))) ?> have no coupon(s)</h4>
              <?php endif ?>
            </div>
            <?php foreach($categoriesData as $categories):
              $storeName = strtolower($categories['store_name']);
              $storeName = preg_replace('/[^A-Za-z0-9-]+/', '-', $storeName);
              $url = BASE_URL . "stores/". $storeName; 
              $expiryDate = $categories['coupon_expiry_date']; 
              $formattedDate = date("F d, Y", strtotime($expiryDate));
             ?>
            <div class="main-coupon">
              <div class="col-md-2 col-sm-12 col-xs-12">
                <a href="<?= $url ?>" target="_blank" class="copycodebtn" data-id="2" data-clipboard-text=" ">
                  <div class="store web_imagebox">
                    <img src="<?= BASE_URL.'admin/store_images/'.$categories['featured_image']?>" alt="121 Workwear-SmartsSaving" class="img-fluid lazy">
                  </div>
                </a>
              </div>
              <div class="col-md-7 col-sm-12 col-xs-12">
                <h3>
                  <a href="<?= $categories['website_url'] ?>" target="_blank"><?= $categories['title'] ?></a>
                </h3>
                <p class="lessContent show-read-more"><?= $categories['coupon_description'] ?></p>
                <span class="coupon-expire-date">Will Expire on: <?= $formattedDate ?></span>
                <span class="totalViews">
                  <strong><?= $categories['click_count'] ?></strong> Times Used </span>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12 coupon-code-main-container">
              <a class="couponClickCountIndexPage" data-coupon-code="<?= $categories['code'] ?>" onclick="countClickIndex(<?= $categories['coupon_id'] ?>)" href="<?= $categories['website_url'] ?>" target="_blank">
                <div class="barcode-image " >
                  <span class="verified-coupon-container">Verified Coupon</span>
                  <span id="coupon-code-placeholder" style="color:#000">Click to reveal coupon code</span>
                </div>
              </a>
            </div>
            </div>
            <?php endforeach ?>
            <div class="main-coupon"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div id="popularStores"><div class="container"><h3>Popular Stores by <span>SmartsSaving.com</span></h3><div class="row"><div class="col-md-3 mb-3"><a href="toni-and-guy.html">Toni and Guy</a></div><div class="col-md-3 mb-3"><a href="easyjet-holidays.html">EasyJet Holidays</a></div><div class="col-md-3 mb-3"><a href="bannerbuzz-canada.html">BannerBuzz Canada</a></div><div class="col-md-3 mb-3"><a href="munchkin.html">Munchkin</a></div><div class="col-md-3 mb-3"><a href="inyouths.html">Inyouths</a></div><div class="col-md-3 mb-3"><a href="musicroom.html">Musicroom</a></div><div class="col-md-3 mb-3"><a href="barking-bags.html">Barking Bags</a></div><div class="col-md-3 mb-3"><a href="kenzo-uk.html">KENZO UK</a></div><div class="col-md-3 mb-3"><a href="pour-moi-skincare.html">Pour Moi Skincare</a></div><div class="col-md-3 mb-3"><a href="book-depository.html">Book Depository</a></div><div class="col-md-3 mb-3"><a href="micas.html">Micas</a></div><div class="col-md-3 mb-3"><a href="workpro.html">Workpro</a></div><div class="col-md-3 mb-3"><a href="sock-shop.html">Sock Shop</a></div><div class="col-md-3 mb-3"><a href="xp-pen.html">XP-PEN</a></div><div class="col-md-3 mb-3"><a href="meshki.html">Meshki</a></div><div class="col-md-3 mb-3"><a href="beach-riot.html">Beach Riot</a></div><div class="col-md-3 mb-3"><a href="woolzies.html">Woolzies</a></div><div class="col-md-3 mb-3"><a href="nobis.html">Nobis</a></div><div class="col-md-3 mb-3"><a href="bloom-towels.html">Bloom Towels</a></div><div class="col-md-3 mb-3"><a href="tokyo-laundry.html">Tokyo Laundry</a></div><div class="col-md-3 mb-3"><a href="simply-cook.html">Simply Cook</a></div><div class="col-md-3 mb-3"><a href="tweeks-cycles.html">Tweeks Cycles</a></div><div class="col-md-3 mb-3"><a href="oxbridge.html">Oxbridge</a></div><div class="col-md-3 mb-3"><a href="discount-dragon.html">Discount Dragon</a></div><div class="col-md-3 mb-3"><a href="myfacesocks.html">MyFaceSocks</a></div><div class="col-md-3 mb-3"><a href="costway.html">Costway</a></div><div class="col-md-3 mb-3"><a href="tfnc-london.html">TFNC London</a></div><div class="col-md-3 mb-3"><a href="the-towel-shop.html">The Towel Shop</a></div><div class="col-md-3 mb-3"><a href="qeeq.html">QEEQ</a></div><div class="col-md-3 mb-3"><a href="f1-store.html">F1 Store</a></div><div class="col-md-3 mb-3"><a href="preppers-shop.html">Preppers Shop</a></div><div class="col-md-3 mb-3"><a href="simmi.html">SIMMI</a></div></div></div></div> -->

<?php include('includes/footer.inc.php') ?>
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
<div id="useOfCouponPopup" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body"></div>
    </div>
  </div>
</div>

