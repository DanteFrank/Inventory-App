
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

<!-- ------------------------------ Brand-------------------------


*/

-->


<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateBrandForm" onsubmit="return false">

          <div class="form-group">
            <label>Brand Name</label>
            <input type="hidden" name="brand_id" id="brand_id" value="">
            <input type="text" class="form-control" name="update_brand_name" id="update_brand_name">
            <small id="category_error" class="form-text text-muted"></small>
          </div>

          <button name="submit" class="btn btn-primary">Update Brand</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- -------------------- Products ---------------------------- -->


-->
<div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateProductForm" onsubmit="return false">

          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="hidden" name="product_id" id="product_id" value="">
              <label for="inputEmail4">Date</label>
              <input type="text" class="form-control" id="added_date" name="added_date" value="<?php echo date ("Y-m-d"); ?>" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Product Name</label>
              <input type="text" class="form-control" id="update_product_name" name="update_product_name" placeholder="Enter Product Name...." required>
            </div>
          </div>

          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="select_category" name="select_category" required>

            </select>
          </div>
          <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="select_brand" name="select_brand" required>

            </select>
          </div>

          <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price..." required>
          </div>
          
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" id="product_stock" name="product_stock" placeholder="Enter Product Quantity..." required>
          </div>

          <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>