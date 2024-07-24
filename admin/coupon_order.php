<?php include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$couponData = $affiliateMarketing->getCouponsData();
?>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Drag &amp; Drop Elements</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Drag &amp; Drop
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Sortable lists section start -->
                <section id="sortable-lists">
                    <div class="row">
                        <!-- Basic List Group -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic List Group Sortable</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p> The most basic list group is simply an unordered list with list items, and the proper
                                            classes.</p>
                                        <ul class="list-group" id="basic-list-group">
                                            <?php foreach($couponData as $i=>$coupon): ?>
                                            <li class="list-group-item coupon-item" data-id="<?= $coupon['id'] ?>">
                                                <div class="media">
                                                    <!-- <img src="" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50"> -->
                                                    <div class="media-body">
                                                        <h5 class="mt-0"><?= $coupon['title'] ?></h5>
                                                        <?= $coupon['description'] ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 
                <!-- // Sortable lists section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php include('includes/footer.inc.php'); ?>
