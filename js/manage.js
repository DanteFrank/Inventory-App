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

    $("body").delegate(".page-link", "click", function() {
        var pn = $(this).attr("pn");
        manageCategory(pn);
    })



});

