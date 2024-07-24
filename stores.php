<?php 
include('includes/header.inc.php'); 


$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();

$storeName = isset($_GET['product_name']) ? $_GET['product_name'] : '';
$storeName = str_replace("-", " ", $storeName);
$storeName = substr($storeName, 0,-4);
$storeName =  ucwords($storeName);
$store = $affiliateMarketing->getStoreByName($storeName); 


?>

<?php
 if(isset($_GET['product_name'])): 
  include('store-single-page.php');
  ?>
  
<?php else: ?>

<?php 
include('allStores.php') ?>

<?php 
endif; 
?>
<script>
      function countClickIndex(id) {
  $('.couponClickCountIndexPage').click(function() {
    $.ajax({
      type: 'POST',
      url: '<?= BASE_URL ?>admin/api/updateClickCount.api.php',
      data: { 'id': id },
      success: function(data) {
        console.log('Success');
      }
    });
  });
}
</script>
<?php include('includes/footer.inc.php'); ?>