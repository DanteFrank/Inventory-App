<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000080;">
    <a class="navbar-brand" href="#">Dante's Inventory System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <?php
            if (isset($_SESSION["userId"])) {
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fa fa-home">&nbsp;</i> Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./includes/logout.php"><i class="fa fa-user">&nbsp;</i>Log Out</a>
                </li>
        <?php
            }
        ?>
        
        
        </ul>
    </div>
</nav>
<br>