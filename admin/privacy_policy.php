<?php include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$card1 = $affiliateMarketing->getPrivacyPolicy1();
$card2 = $affiliateMarketing->getPrivacyPolicy2();
$card3 = $affiliateMarketing->getPrivacyPolicy3();
$card4 = $affiliateMarketing->getPrivacyPolicy4();

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
                    <!-- Zero configuration table -->
                    <section id="configuration">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header"><h5>Card 1</h5></div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <form id="privacyPolicy1">
                                                <label>Heading</label>
                                                <input type="text" class="form-control" name="heading1" value="<?php echo $card1['0']['heading'] ?>">
                                                <div class="form-group mt-2">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description1"><?php echo $card1['0']['description'] ?></textarea>
                                              </div>
                                        <input type="submit" class="btn btn-info mt-2" value="Save Changes">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-content collapse show">
                                            <div class="card-header"><h5>Card 2</h5></div>
                                        <div class="card-body card-dashboard">
                                            <form id="privacyPolicy2">
                                                <label>Heading</label>
                                                <input type="text" class="form-control" name="heading2" value="<?php echo $card2['0']['heading'] ?>">
                                                <div class="form-group mt-2">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description2"><?php echo $card2['0']['description'] ?></textarea>
                                              </div>
                                              <input type="submit" class="btn btn-info mt-2" value="Save Changes">
                                            </form>
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
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header"><h5>Card 3</h5></div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                                <form id="privacyPolicy3">
                                                <label>Heading</label>
                                                <input type="text" class="form-control" name="heading3" value="<?php echo $card3['0']['heading'] ?>">
                                                <div class="form-group mt-2">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description3"><?php echo $card3['0']['description'] ?></textarea>
                                              </div>
                                              <input type="submit" class="btn btn-info mt-2" value="Save Changes">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-content collapse show">
                                            <div class="card-header"><h5>Card 4</h5></div>
                                        <div class="card-body card-dashboard">
                                            <form id="privacyPolicy4">
                                                <label>Heading</label>
                                                <input type="text" class="form-control" name="heading4" value="<?php echo $card4['0']['heading'] ?>">
                                                <div class="form-group mt-2">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description4"><?php echo $card4['0']['description'] ?></textarea>
                                              </div>
                                              <input type="submit" class="btn btn-info mt-2" value="Save Changes">
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