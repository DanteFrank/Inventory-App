<?php

$conn = mysqli_connect("localhost", "root", "", "inventory_app");
//include_once("../database/db.php");

function pagination($conn, $table, $page_num, $n) {
    $query = $conn->query("SELECT COUNT(*) AS rows FROM ".$table);
    $row = mysqli_fetch_assoc($query);
    $pageNum = $page_num;
    $numberOfRecordsPerPage = $n;

    $lastPage = ceil($row["rows"]/$numberOfRecordsPerPage);

    echo "Total Pages ".$lastPage."<br>";

    $pagination = "";

    if ($lastPage != 1) {
        if ($pageNum > 1) {
            $previous = "";
            $previous = $pageNum - 1;
            $pagination .= "<a href='pagination.php?pageNum=".$previous."'> Previous </a>";
        }
        for ($i=$pageNum - 5; $i< $pageNum ; $i++) { 
            if ($i > 0) {
                $pagination .="<a href='pagination.php?pageNum=".$i."'> ".$i." </a>";
            }
        }

        $pagination .="<a href='pagination.php?pageNum=".$pageNum."' style= color:#333;> $pageNum </a>";

        for ($i=$pageNum + 1; $i< $lastPage; $i++) {
            $pagination .="<a href='pagination.php?pageNum=".$i."'> ".$i." </a>";
            if ($i > $pageNum + 4) {
            break;
            }
        }
        if ($lastPage > $pageNum) {
            $next = $pageNum + 1;
            $pagination .="<a href='pagination.php?pageNum=".$next."' style=color:#333;> Next </a>";
        }
    }

    //lIMIT 0,10
    //LIMIT 20,10
    $limit = "LIMIT ".($pageNum - 1) * $numberOfRecordsPerPage."," .$numberOfRecordsPerPage;

    return ["pagination"=>$pagination, "LIMIT"=>$limit];
}

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