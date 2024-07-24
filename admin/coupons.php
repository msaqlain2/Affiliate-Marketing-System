<?php include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresData();
$couponCategories = $affiliateMarketing->getAllCouponCategories();

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
                <form method="post" id="addCouponForm">
                    <!-- Zero configuration table -->
                    <section id="configuration">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="card">
                                    <div class="card-header"><h5>General Options</h5></div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <label>Coupon Title</label>
                                            <input type="text" class="form-control" name="couponTitle" required>
                                            <label class="mt-2">Coupon Description</label>
                                            <textarea class="form-control" name="description" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <h5>Coupon Stores</h5>
                                                <?php foreach($storesData as $store):  ?>
                                                <div class="form-check mt-1">
                                                  <input class="form-check-input" type="checkbox" value="<?= $store['id'] ?>" onclick="limit_checkboxes(this)" id="<?= $store['id'] ?>" name="couponStore" >
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
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="card">
                                    <div class="card-header"><h5>Advance Options</h5></div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                                <label>Affliaite Link</label>
                                                <input type="url" class="form-control" name="affiliateLink" required>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="mt-2">Coupon Code</label>
                                                        <input type="text" class="form-control" name="couponCode" >
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="mt-2">Expiry Date</label>
                                                        <input type="date" class="form-control" name="expiryDate" value="<?php echo date('Y-m-d') ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="mt-2">Select Coupon Order</label>
                                                        <select class="form-control" name="couponOrder" >
                                                    <option disabled selected>Select Order</option>    
                                                    <?php foreach($couponOrder as $order): ?>
                                                    <option value="<?= $order['id'] ?>"><?= $order['name'] ?></option>
                                                    <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check mt-2">
                                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault6" name="hotStory">
                                                  <label class="form-check-label" for="flexCheckDefault6">
                                                    Add to coupons
                                                  </label>
                                                </div>   
                                                </div>
                                            </div>
                                            
                                             
                                
                                                <button type="submit" class="btn btn-info mt-2">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <h5>Coupon Categories</h5>
                                            <?php foreach($couponCategories as $category): ?>
                                                
                                    <div class="form-check mt-1">
                                      <input class="form-check-input" type="checkbox" <?php if($category['id'] == 0){ echo "checked"; } ?>  onclick="limit_categories_checkboxes(this)" value="<?= $category['id'] ?>" id="parent_<?= $category['id'] ?>" name="category">
                                                  <label class="form-check-label" for="parent_<?= $category['id'] ?>">
                                                    <?= $category['category'] ?>
                                                  </label>
                                    </div>

                

                                           <?php endforeach;?>
                                                
                                          </div>
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