<?php include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$bannerImage = $affiliateMarketing->getBannerImage();

?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Banner Image</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Banner Image
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
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <form id="uploadBannerImageForm">
                                            <label>Upload New Banner Image</label>
                                        <input type="file" class="form-control" name="bannerImage">
                                        <input type="submit" class="btn btn-info mt-2">
                                        </form>
                                <label class="mt-3">Current Image:</label><br>
                                <img src="<?php echo 'banner_image/'. $bannerImage['0']['banner_image'] ?>" height="150">
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
