<!-- Header -->
<?php require("templates/header.php"); ?>

<!-- Navbar -->
<?php require("templates/navbar.php"); ?>

<!-- Body -->
<div class="container">

    <?php 
        if (isset($_GET["msg"]) AND !empty($_GET["msg"])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET["msg"] ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php
        }
    ?>

    <div class="card mx-auto" style="width: 18rem;">
        <img src="images/login.png" 
        style="width:60%;" class="card-img-top mx-auto" alt="login Images">
        <div class="card-body">
            <form id="login_form" onsubmit="return false">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="login_email" id="login_email">
                    <small id="email_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="login_pwd" id="login_pwd">
                    <small id="pwd_error" class="form-text text-muted"></small>

                </div>
    
                <button type="submit" class="btn btn-primary" name="login"><i class="fa fa-lock">&nbsp;</i> Login In</button>
                <span><a href="register.php">Register</a></span>
            </form>
        </div>
        <div class="card-footer"><a href="#">Forget Password ?</a></div>
    </div>
</div>

<!-- Footer -->
<?php require("templates/footer.php"); ?>

