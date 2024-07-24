<?php include('includes/header.inc.php'); 
$affiliateMarketing = new affiliateMarketing();
$allCategories = $affiliateMarketing->getAllCouponCategories();

$categoryName = isset($_GET['category_name']) ? $_GET['category_name'] : '';
$categoryName = str_replace("-", " ", $categoryName);
$categoryName = substr($categoryName, 0,-4);
$categoryName =  ucwords($categoryName);

$categoriesData = $affiliateMarketing->getCategoryByName($categoryName);

?>


 <?php if(isset($_GET['category_name'])): 
  include('category-single-page.php');
  ?>
  
<?php else: ?>

<?php 
include('allCategories.php') ?>

<?php 
endif; 
?>
<script>
      function countClickIndex(id) {
  $('.couponClickCountIndexPage').click(function() {
    console.log(id);
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