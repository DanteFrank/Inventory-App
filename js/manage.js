$(document).ready(function () {
    var DOMAIN = "http://localhost/phpsandbox/Inventory";


    //Manage Category
    manageCategory(1);
    function manageCategory(pn) {
        $.ajax({
            url : DOMAIN+"/includes/process.inc.php",
            method : "POST",
            data : {manageCategory:1, pageNum:pn},
            success : function(data) {
                $("#get_category").html(data);
            }
        });
    }

    //Pagination
    $("body").delegate(".page-link", "click", function() {
        var pn = $(this).attr("pn");
        manageCategory(pn);
    })

    //Delete Category
    $("body").delegate(".delete_cat", "click", function() {
        var did = $(this).attr("did");
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : {deleteCategory:1, id:did},
                success : function(data) {
                    if (data == "DEPENDENT_CATEGORY") {
                        alert("Sorry! This category is dependent on other categories");
                    } else if(data == "CATEGORY_DELETED") {
                        alert("Category Deleted Succefully");
                        manageCategory(1);
                    } else if(data == "DELETED") {
                        alert("Deleted Successfully");
                    } else {
                        alert(data);
                    }
                }
            });
        } else {
            alert("No");
        }
    })





    //Edit & Update Category
    $("body").delegate(".edit_cat", "click", function() {
        var eid = $(this).attr("eid");
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : {updateCategory:1, id:eid},
                dataType: "json",
                success : function(data) {
                    console.log(data);
                    $("#category_id").val(data["category_id"]);
                    $("#update_category_name").val(data["category_name"]);
                    $("#parent_category").val(data["parent_category"]);
                }
            });

    })

    $("#updateCategoryForm").on("submit", function() {
        if ($("#update_category_name").val() == "") {
            $("#update_category_name").addClass("border-danger");
            $("#category_error").html("<span class='text-danger'>Enter Category Name</span>");
        } else {
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : $("#updateCategoryForm").serialize(),
                success : function(data) {
                   if (data == "CATEGORY_ADDED") {
                    $("#update_category_name").removeClass("border-danger");
                    $("#category_error").html("<span class='text-success'>Category Added successfuly!</span>");
                    $("#update_category_name").val("");
                    fetch_category();
                   } else {
                       window.location.href= "";
                   }
                }
            });
        }
    })



    //------------- Brand Management ---------------------------
     //Manage Brand
     manageBrand(1);
     function manageBrand(pn) {
         $.ajax({
             url : DOMAIN+"/includes/process.inc.php",
             method : "POST",
             data : {manageBrand:1, pageNum:pn},
             success : function(data) {
                 $("#get_brand").html(data);
             }
         });
     }


    //Pagination
    $("body").delegate(".page-link", "click", function() {
        var pn = $(this).attr("pn");
        manageBrand(pn);
    })


    //Delete Brand
    $("body").delegate(".delete_brand", "click", function() {
        var did = $(this).attr("did");
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : {deleteBrand:1, id:did},
                success : function(data) {
                    if (data == "DELETED") {
                        alert("Brand Deleted!");
                        manageBrand(1);
                    } else {
                        alert(data);
                    }
                }
            });
        }
    })


    //Edit & Update Category
    $("body").delegate(".edit_brand", "click", function() {
        var eid = $(this).attr("eid");
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : {updateBrand:1, id:eid},
                dataType: "json",
                success : function(data) {
                    console.log(data);
                    $("#brand_id").val(data["brand_id"]);
                    $("#update_brand_name").val(data["brand_name"]);
                }
            });

    })

    $("#updateBrandForm").on("submit", function() {
        if ($("#update_brand_name").val() == "") {
            $("#update_brand_name").addClass("border-danger");
            $("#category_error").html("<span class='text-danger'>Enter Category Name</span>");
        } else {
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : $("#updateBrandForm").serialize(),
                success : function(data) {
                   if (data == "BRAND_ADDED") {
                    $("#update_brand_name").removeClass("border-danger");
                    $("#category_error").html("<span class='text-success'>Brand Added successfuly!</span>");
                    $("#update_brand_name").val("");
                    fetch_category();
                   } else {
                       window.location.href= "";
                   }
                }
            });
        }
    })



    //--------------------- Products Management ----------------------------------


    //Manage Product
    manageProduct(1);
    function manageProduct(pn) {
        $.ajax({
            url : DOMAIN+"/includes/process.inc.php",
            method : "POST",
            data : {manageProduct:1, pageNum:pn},
            success : function(data) {
                $("#get_product").html(data);
            }
        });
    }

     //Pagination
     $("body").delegate(".page-link", "click", function() {
        var pn = $(this).attr("pn");
        manageProduct(pn);
    })


     //Delete Product
     $("body").delegate(".delete_product", "click", function() {
        var did = $(this).attr("did");
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : {deleteProduct:1, id:did},
                success : function(data) {
                    if (data == "DELETED") {
                        alert("Product Deleted!");
                    } else {
                        alert(data);
                    }
                }
            });
        }
    })


    //Edit & Update Product
    $("body").delegate(".edit_product", "click", function() {
        var eid = $(this).attr("eid");
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : {updateProduct:1, id:eid},
                dataType: "json",
                success : function(data) {
                    console.log(data);
                    $("#product_id").val(data["product_id"]);
                    $("#update_product_name").val(data["product_name"]);
                    $("#select_category").val(data["category_id"]);
                    $("#select_brand").val(data["brand_id"]);
                    $("#product_price").val(data["product_price"]);
                    $("#product_stock").val(data["product_stock"]);
                }
            });

    })


    $("#updateProductForm").on("submit", function() {
            $.ajax({
                url : DOMAIN+"/includes/process.inc.php",
                method : "POST",
                data : $("#updateProductForm").serialize(),
                success : function(data) {
                    if (data == "UPDATED") {
                        alert("Product Updated Successfully!");
                        window.location.href= "";
                    } else {
                        alert(data);
                    }
                }
            });
    })



});

