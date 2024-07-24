<div class="modal fade text-left" id="editSubCategory" tabindex="-1" role="dialog" aria-labelledby="subCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="subCategory">Edit Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editsubCategoryForm">
                <div class="modal-body">
                    <label>Category: </label>
                    <div class="form-group">
                        <select class="form-control" name="category" id="editCategoryId" required>
                            <option value="" disabled selected>Select Category</option>
                        </select>
                    </div>

                    <label>Sub Category: </label>
                    <div class="form-group">
                        <input type="text" name="subCategory" id="editSubCategoryName" placeholder="Category Name" class="form-control" required >
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


