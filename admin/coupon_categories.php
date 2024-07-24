<?php 
if(!isset($_SESSION)) session_start();
include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$couponCodes = $affiliateMarketing->getAllCouponCategories();
?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Category</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Category
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#newCouponCategory">Add New</button>
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
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Category</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($couponCodes as $i=>$code):
                                                     ?>
                                                     <tr>
                                                        <td><?= $i+1 ?></td>
                                                        <td><?= $code['category'] ?></td>   
                                                        <td>
                                                            <button class="btn btn-warning btn-sm" onclick="editCouponCategory(<?= $code['id'] ?>);updateCouponCategory(<?= $code['id'] ?>)" href="javscript:void(0)" data-toggle="modal" data-target="#editCouponCategory"><i class="la la-edit"></i></button>
                                                            <button class="btn btn-danger btn-sm" onclick="deleteCouponCategory(<?= $code['id'] ?>)"><i class="la la-trash"></i></button>
                                                        </td>  
                                                     </tr>
                                                    
                                                    <?php endforeach; ?>
                                                <tfoot>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Category</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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

<?php include('assets/component-modals/addNewCategory.modal.php'); ?>
<?php include('assets/component-modals/updateCategory.modal.php'); ?>
<?php include('includes/footer.inc.php'); ?>