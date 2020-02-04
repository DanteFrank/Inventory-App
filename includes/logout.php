<?php

include_once("../database/constants.php");

if (isset($_SESSION["userId"])) {
    session_destroy();
}
header("location: ".DOMAIN."/");