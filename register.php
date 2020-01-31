<!-- Header -->
<?php require("templates/header.php"); ?>

<!-- Navbar -->
<?php require("templates/navbar.php"); ?>

    <div class="container">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Register</div>

            <div class="card-body">
            <form id="register_form" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" placeholder="FullName" name="fname" id="fname">
                        <small class="form-text text-muted" id="fname_error"></small>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                        <small class="form-text text-muted" id="email_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd">
                        <small class="form-text text-muted" id="pwd_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Re-Enter Passowrd</label>
                        <input type="password" class="form-control" placeholder="Re-Enter Password" name="pwd2" id="pwd2">
                        <small class="form-text text-muted" id="pwd2_error"></small>

                    </div>
                    <div class="form-group">
                        <label for="usertype">UserType</label>
                        <select name="usertype" id="usertype" class="form-control">
                            <option value="">Choose User Type</option>
                            <option value="1">Admin</option>
                            <option value="0">Guest</option>
                        </select>
                        <small class="form-text text-muted" id="user_error"></small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="register"><span class="fas fa-user"></span>&nbsp; Register</button>
                    <span><a href="index.php">Login</a></span>
                </form>
            </div>  <!-- End of Card-body -->
            <div class="card-footer text-muted">
                <a href="#">Forgotten Password?</a>
            </div>
        </div>  <!-- End of Card -->
    </div>





<!-- Footer -->
<?php require("templates/footer.php"); ?>
