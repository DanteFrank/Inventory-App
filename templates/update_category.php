
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCategoryForm" onsubmit="return false">

          <div class="form-group">
            <label>Catergory Name</label>
            <input type="hidden" name="category_id" id="category_id" value="">
            <input type="text" class="form-control" name="update_category_name" id="update_category_name">
            <small id="category_error" class="form-text text-muted"></small>
          </div>
          
          <div class="form-group">
            <label>Parent Category</label>
            <select name="parent_category" id="parent_category" class="form-control">
            
            </select>
          </div>

          <button name="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>