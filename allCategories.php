<style>
	.section
	{
		background-color:#f1efee;
		padding:30px 0;
	}
	.category-box
	{
		/*background-color:#fff;*/
		margin-bottom:30px;
	}
	.web_imagebox
	{
		height: 150px;
    background-color: #fff;
    border-radius:5px;
    box-shadow: 0 0 18px 0px #d8d8d88f;
	}
	h2.title
	{
		font-size:20px;
		text-align:center;
		margin:12px 0;
		overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
	}
	.category-box a
	{
		color:#444;
	}
	.category-box a:hover
	{
		color:#444;
		text-decoration: none
	}
</style>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 style="margin-bottom:20px">Find Coupons by Categories</h1>
			</div>
			<?php foreach($allCategories as $categories): 
			    if($categories['id'] != 0):
				$categoryName = strtolower($categories['category']);
		        $categoryName = preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryName);
		        $url = BASE_URL . "categories/". $categoryName;
				?>
				<div class="col-lg-3 co-md-3 col-sm-4 col-12">
					<div class="category-box">
						<a href="<?= $url ?>">
						<div class="store web_imagebox">
				      <img src="<?= BASE_URL.'admin/category_images/'.$categories['category_image'] ?>" class="img-fluid lazy">
				    </div>
				    <h2 class="title"><?= $categories['category'] ?></a>
					</div>
				</div>
			<?php
			endif;
			endforeach; ?>
							
					</div>
	</div>
</div>
<div id="useOfCouponPopup" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div class="modal-body" >
				
			</div>
		</div>
	</div>
</div>