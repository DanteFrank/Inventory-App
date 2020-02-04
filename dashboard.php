<?php include_once("database/constants.php");

if (!isset($_SESSION['userId'])) {
    header("location: ".DOMAIN."/");
}
?>



<!-- Header -->
<?php require("templates/header.php"); ?>

<!-- Navbar -->
<?php require("templates/navbar.php"); ?>

<!-- Dashboard Body -->
<div class="container">
    <div class="row">

        <!-- Admin Panel -->
        <div class="col-md-8">
                <div class="jumbotron" style="width:100%;height:100%;">
                    <h1>Welcome Admin</h1>
                    <div class="col-sm-6 float-sm-left">
                        <iframe src="http://free.timeanddate.com/clock/i73qirsk/n1972/szw160/szh160/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd94/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="160" height="160"></iframe>
                    </div>

                    <!-- Order Placement For Admin -->
                    <div class="col-sm-6 float-sm-left">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text">Here you can create New Invoices and order.</p>
                                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart">&nbsp;</i>New Orders</a>
                            </div>
                        </div>
                    </div> <!-- End of Order Placement -->
                </div>  <!-- End of jumbotron -->
        </div><!-- End of Admin Panel -->

        <!-- User Porfile Panel -->
        <div class="col-md-4">
            <div class="card mx-auto" style="width:20rem;">
                <img src="images/user.jpg" style="width:60%;" class="card-img-top mx-auto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Profile Info</h5>
                    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Dante Frank</p>
                    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                    <p class="card-text">Last Login: xxxxxx</p>
                    <a href="#" class="btn btn-primary"><i class="fas fa-user-edit">&nbsp;</i>Edit Profile</a>
                </div>
            </div>
        </div> <!-- End of User Profile -->
    </div> <!-- End of Row -->
</div>

<br>

<!-- Management Section -->
<div class="container">
    <div class="row">

        <!-- Category card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body" >
                    <h4 class="card-title">Categories</h4>
                    <p class="card-text">Here you can add and manage your categories.</p>
                    <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#category"><i class="fas fa-edit">&nbsp;</i>Add</a>
                    <a href="#" class="btn btn-primary"><i class="fas fa-edit">&nbsp;</i>Manage</a>
                </div>
            </div>
        </div>

        <!-- Brands Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body" >
                    <h4 class="card-title">Brands</h4>
                    <p class="card-text">Here you can add and manage your Brands.</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#brands"><i class="fas fa-edit">&nbsp;</i>Add</a>
                    <a href="#" class="btn btn-primary"><i class="fas fa-edit">&nbsp;</i>Manage</a>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products</h4>
                <p class="card-text">Here you can add and manage your products.</p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#products"><i class="fas fa-edit">&nbsp;</i>Add</a>
                <a href="#" class="btn btn-primary"><i class="fas fa-edit">&nbsp;</i>Manage</a>
            </div>
        </div>
    </div>
</div>  <!-- End of Management Section -->

<?php   include_once("templates/modals.php"); ?>

<!-- Footer -->
<?php require("templates/footer.php"); ?>
