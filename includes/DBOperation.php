<?php

/**
 * Database Operations For Categories
 */
class DBOperation 

{
    private $conn;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function addCategory($parent_category, $category_name) {

        //Sql stmt
        $stmt = $this->conn->prepare("INSERT INTO `categories`(`parent_category`, `category_name`, `status`) VALUES (?,?,?)");
        $status = 1;
        $stmt->bind_param("isi", $parent_category, $category_name, $status);
        $result = $stmt->execute() or die($this->conn->error);

       if ($result) {
           return "CATEGORY_ADDED";
       } else {
           return 0;
       }
    }



    public function addBrand($brand_name) {

        //Sql stmt
        $stmt = $this->conn->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
        $status = 1;
        $stmt->bind_param("si", $brand_name, $status);
        $result = $stmt->execute() or die($this->conn->error);

       if ($result) {
           return "BRAND_ADDED";
       } else {
           return 0;
       }
    }



    public function addProduct($category_id, $brand_id, $product_name, $product_price, $product_stock, $added_date) {
        $stmt = $this->conn->prepare("INSERT INTO `products`(`category_id`, `brand_id`, `product_name`, `product_price`, `product_stock`, `added_date`, `product_status`) VALUES (?,?,?,?,?,?,?)");
        $product_status = 1;
        $stmt->bind_param("iisdisi", $category_id, $brand_id, $product_name, $product_price, $product_stock, $added_date, $product_status);
        $result = $stmt->execute() or die($this->conn->error);

        if ($result) {
            return "NEW_PRODUCT_ADDED";
        } else {
            return 0;
        }
    }




    public function getAllRecord($table) {
        $stmt = $this->conn->prepare("SELECT * FROM .$table");
        $stmt->execute() or die($this->conn->error);
        $result = $stmt->get_result();

        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            } return $rows;
        } else {
            return "NO_DATA";
        }
    }



}

//$opr = new DBOperation();
//echo $opr->addCategory(0, "Gadgets");
//echo '<pre>';
//print_r($opr->getAllRecord('categories'));
