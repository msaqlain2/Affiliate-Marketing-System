<div id="stores" class="list-box">
  <div class="filter-stores">
    <div class="container">
      <h1>Find Coupons by Stores</h1>
      <div id="filter-stores-group">
        <button type="button" class="btn btn-orange btn-md active" data-type="all" id="allStores">All</button>
        <button type="button" id="featuredStores" class="btn btn-orange btn-md" data-type="featured">Featured</button>
      </div>
      <div class="form">
          <div class="form-group">
            <input type="text" class="form-control" id="search-stores" placeholder="Search Store">
          </div>
    </div>
    </div>
  </div>
  <div id="storeslist">
      <div class="container">
        <div class="row stores-list">
          <?php foreach($storesData as $store): 
            $storeName = strtolower($store['store_name']);
            $storeName = preg_replace('/[^A-Za-z0-9-]+/', '-', $storeName);
            $url = BASE_URL . "stores/". $storeName;
          ?>
            <div class="col-md-3 col-sm-4 col-6 store-item" data-store-name="<?= strtolower($store['store_name']) ?>">
              <div class="coupon-item store-list storeCouponGrid">
                <a href="<?= $url ?>">
                  <div class="store web_imagebox">
                    <img src="<?='admin/store_images/'.$store['featured_image'] ?>" class="img-fluid lazy">
                  </div>
                </a>
                <div class="col-xs-12 coupon-detail-container">
                  <a href="<?= $url ?>"><?= $store['store_name'] ?></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
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

<script>
  var searchStores = document.getElementById('search-stores');
  var storeItems = document.getElementsByClassName('store-item');

  searchStores.addEventListener('keyup', function() {
    var query = searchStores.value.toLowerCase();

    for (var i = 0; i < storeItems.length; i++) {
      var storeName = storeItems[i].getAttribute('data-store-name').toLowerCase();

      if (storeName.indexOf(query) === -1) {
        storeItems[i].style.display = 'none';
      } else {
        storeItems[i].style.display = 'block';
      }
    }
  });
</script>