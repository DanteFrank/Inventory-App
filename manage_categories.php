<?php include_once("database/constants.php");

if (!isset($_SESSION['userId'])) {
    header("location: ".DOMAIN."/");
}
?>



<!-- Header -->
<?php require("templates/header.php"); ?>

<!-- Navbar -->
<?php require("templates/navbar.php"); ?>

<!-- Body -->
<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="get_category">
        <!--<tr>
            <td>1</td>
            <td>Electronics</td>
            <td>Root</td>
            <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                <a href="#" class="btn btn-info btn-sm">Edit</a>
            </td>
        </tr> -->
        </tbody>
    </table>
</div>













<!-- Footer -->
<?php require("templates/footer.php"); ?>