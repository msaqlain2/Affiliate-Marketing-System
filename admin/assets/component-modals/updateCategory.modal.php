<div class="modal fade text-left" id="editCouponCategory" tabindex="-1" role="dialog" aria-labelledby="couponCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="couponCategory">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editcouponCategoryForm">
	            <div class="modal-body">
                	<label>Category: </label>
                    <div class="form-group">
                        <input type="text" name="category" id="editCategory" placeholder="Category Name" class="form-control" required>
                    </div>
                    <label>Category Image: </label>
                    <div class="form-group">
                        <input type="file" name="categoryImage" id="editCategoryImage" placeholder="Category Name" class="form-control">
                    </div>
                    <input type="text" name="oldCategoryImage" hidden id="editOldCategoryImage" placeholder="Category Name" class="form-control" >
	            </div>

	            <div class="modal-footer">
	                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-outline-primary">Save changes</button>
	            </div>
            </form>
        </div>
    </div>
</div>


