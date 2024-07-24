<?php
if(!isset($_SESSION)) session_start();
 include('includes/header.inc.php'); 
include('includes/sidebar.inc.php');
include('models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresData();
?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Store List</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Store List    
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
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Website</th>
                                                        <th>Affiliate Link</th>
                                                        <th>Coupon Expiry Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($storesData as $i=>$store):
                                                     ?>
                                                     <tr>
                                                         <td><?= $i+1 ?></td>
                                                         <td><?= $store['store_name'] ?></td>
                                                         <td><?= $store['website_url'] ?></td>
                                                         <td><?= $store['affliliate_link'] ?></td>
                                                         <td><?= $store['coupon_expiry_date'] ?></td>
                                                         <td class="text-center">
                                                            <a href="edit_store?id=<?= $store['id'] ?>"><button class="btn btn-warning  btn-sm" id="editStoreBtn" data-id="<?= $store['id'] ?>"><i class="la la-edit"></i></button></a>
                                                            <button class="btn btn-danger btn-sm" onclick="deleteStore(<?= $store['id'] ?>)"><i class="la la-trash" ></i></button>
                                                         </td>
                                                     </tr>
                                                    <?php endforeach  ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Website</th>
                                                        <th>Affiliate Link</th>
                                                        <th>Coupon Expiry Date</th>
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
<?php include('includes/footer.inc.php'); ?>