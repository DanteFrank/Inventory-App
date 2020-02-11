<?php

$conn = mysqli_connect("localhost", "root", "", "inventory_app");
//include_once("../database/db.php");



if (isset($_GET["pageNum"])) {
    $pageNum = $_GET["pageNum"];
    $table = "products";
    $array = pagination($conn, $table, $pageNum, 10);

    $sql = "SELECT * FROM ".$table." ".$array["limit"];
    $query = $conn->query($sql);

    while ($row = mysqli_fetch_assoc($query)) {
        echo "<div style='margin:0 auto;font-size:20px;'><b>".$row["product_id"]."</b> ".$row["product_name"]."</div>";
    }
    echo "<div style='font-size: 22px;'>".$array["pagination"];
}