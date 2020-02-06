<!-- 
  
Category Modal

-->
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
        <form id="category_form" onsubmit="return false">
          <div class="form-group">
            <label>Catergory Name</label>
            <input type="text" class="form-control" name="category_name" id="category_name">
            <small id="category_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Parent Category</label>
            <select name="parent_category" id="parent_category" class="form-control">
            
            </select>
          </div>

          <button name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<!--   
  
Brands Modal  

-->
<div class="modal fade" id="brands" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="brand_form" onsubmit="return false">
            <div class="form-group">
              <label>Brand Name</label>
              <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name.....">
              <small id="brand_error" class="form-text text-muted"></small>
            </div>

            <button name="submit" class="btn btn-primary">Add</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






<!-- 
  
Products Modal 

-->
<div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="product_form" onsubmit="return false">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Date</label>
              <input type="text" class="form-control" id="added_date" name="added_date" value="<?php echo date ("Y-m-d"); ?>" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Product Name</label>
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name...." required>
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

          <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>