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


});

