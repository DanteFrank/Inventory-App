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

    //Delete Record
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

});

