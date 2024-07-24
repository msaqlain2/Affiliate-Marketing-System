<?php include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresData();
$couponCategories = $affiliateMarketing->getAllCouponCategories();
$couponData = $affiliateMarketing->getAllCouponsData($_GET['id']);


?>

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Add Coupon</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Coupon
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <form method="post" id="editCouponForm">
                    <!-- Zero configuration table -->
                    <section id="configuration">
                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-header"><h5>General Options</h5></div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <label>Coupon Title</label>
                                            <input type="text" class="form-control" name="couponTitle" required value="<?php echo $couponData[0]['title'] ?>">
                                            <label class="mt-2">Coupon Description </label>
                                            <textarea class="form-control" name="description" rows="3" required><?php echo $couponData[0]['description'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <h5>Coupon Stores</h5>
                                                <?php foreach($storesData as $store):  ?>
                                                <div class="form-check mt-1">
                                                  <input class="form-check-input" type="checkbox" value="<?= $store['id'] ?>" onclick="limit_checkboxes(this)" id="<?= $store['id'] ?>" name="couponStore" 

                                                    
                                        <?php if (intval($couponData[0]['store_id']) == intval($store['id'])): ?>
                                                    checked
                                                  <?php endif; ?>
                                                    

                                                  >
                                                  <label class="form-check-label" for="<?= $store['id'] ?>">
                                                    <?= $store['store_name']; ?>
                                                  </label>
                                                </div>
                                            <?php endforeach; ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--/ Zero configuration table -->

                     <!-- Zero configuration table -->
                    <section id="configuration">
                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-header"><h5>Advance Options</h5></div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                                <label>Affliaite Link</label>
                                                <input type="url" class="form-control" name="affiliateLink" required value="<?php echo $couponData[0]['affiliate_link'] ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="mt-2">Coupon Code</label>
                                                        <input type="text" class="form-control" name="couponCode" value="<?php echo $couponData[0]['code'] ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="mt-2">Expiry Date</label>
                                                        <input type="date" class="form-control" name="expiryDate"  required value="<?php echo $couponData[0]['expiry_date'] ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="mt-2">Select Coupon Order</label>
                                                        <select class="form-control" name="couponOrder">
                                                    <option disabled selected>Select Order</option>    
                                                    <?php foreach($couponOrder as $order): ?>
                                                    <option value="<?= $order['id'] ?>"
                                            <?php  if($order['id'] == $couponData[0]['coupon_reorder']):?>
                                            selected
                                            <?php endif; ?>
                                                    ><?= $order['name'] ?></option>
                                                    <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check mt-2">
                                              <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault6" name="hotStory"
                                              <?php if($couponData[0]['is_hot_story'] === '1'):
                                                echo "checked";
                                                endif;
                                                ?>
                                              >
                                              <label class="form-check-label" for="flexCheckDefault6">
                                                Add to hot Stores
                                              </label>
                                            </div>   
                                                </div>
                                            </div>

                                                <button type="submit" class="btn btn-info mt-2">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <h5>Coupon Categories</h5>
                                            <?php foreach($couponCategories as $category): ?>
                                            
                                            <div class="form-check mt-1">
                                      <input class="parent-checkbox" type="checkbox"  onclick="limit_categories_checkboxes(this)" value="<?= $category['id'] ?>" id="parent_<?= $category['id'] ?>" name="category"
                                        <?php if (intval($couponData[0]['category']) == intval($category['id'])): ?>
                                                    checked
                                                  <?php endif; ?>
                                                    
                                      
                                      >
                                                  <label class="form-check-label" for="parent_<?= $category['id'] ?>">
                                                    <?= $category['category'] ?>
                                                  </label>
                                    </div>
                                           <?php  endforeach;?>
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--/ Zero configuration table -->
                </form>



            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php include('includes/footer.inc.php'); ?>