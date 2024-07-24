<?php 
if(!isset($_SESSION)) session_start();
include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getStoreById($_GET['id']);
$categoriesData = $affiliateMarketing->getAllCouponCategories();
?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Store</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Store
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header"><h5>General Options</h5></div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <form method="post" id="editStoreForm">
                                            <label>Store Name</label>
                                            <input type="text" class="form-control" name="storeName" required value="<?php echo $storesData[0]['store_name'] ?>">

                                            <label class="mt-2">Store Categories</label>
                                            <select class="form-control" id="" name="storeCategories" required>
                                                <option value="" disabled selected>Select Category</option>
                                                
                                                <?php foreach($categoriesData as $category): ?>
                                                    <option value="<?= $category['id'] ?>"
                                            <?php  if($category['id'] == $storesData[0]['store_categories']):?>
                                            selected
                                            <?php endif; ?>
                                                    ><?= $category['category'] ?></option>
                                            <?php endforeach; ?>
                                                    
                                                    
                                                    
                                                </option>

                                            </select>

                                            <label class="mt-2">Website URL</label>
                                            <input type="url" class="form-control" name="websiteUrl" required value="<?php echo $storesData[0]['website_url'] ?>">

                                            <label class="mt-2">Affiliate Link</label>
                                            <input type="url" class="form-control" name="affiliateLink" required value="<?php echo $storesData[0]['affliliate_link'] ?>">



                                            <label class="mt-3">Upload Featured Image</label>
                                            <input type="file"class="form-control" name="featuredImage">

                                            <input type="text" hidden class="form-control" name="oldFeaturedImage" value="<?php echo $storesData[0]['featured_image'] ?>" required>

                                            <div class="form-check mt-2">
                                              <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault6" name="hotStory"
                                              <?php if($storesData[0]['is_hot_story'] === '1'):
                                                echo "checked";
                                                endif;
                                                ?>
                                              >
                                              <label class="form-check-label" for="flexCheckDefault6">
                                                Add to hot Stores
                                              </label>
                                            </div>

                                            <label class="mt-2">Description</label>
                                            <textarea class="form-control" name="description" rows="3"  required><?php echo $storesData[0]['description'] ?></textarea>
                                            
                                            <label class="mt-2">Default Coupon Expiry Date</label>
                                            <input type="date" class="form-control" name="expiryDate" value="<?php echo $storesData[0]['coupon_expiry_date'] ?>" required>
                                            
                                            <button type="submit" class="btn btn-info mt-2"> Update Store</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php include('includes/footer.inc.php'); ?>
