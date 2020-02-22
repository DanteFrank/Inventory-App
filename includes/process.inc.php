<?php

include_once("../database/constants.php");
include_once("users.inc.php");
include_once("DBOperation.inc.php");
include_once("manage.inc.php");

//For Registration
if (isset($_POST["fname"]) AND isset($_POST["email"])) {
    $user = new User();
    $result = $user->createUserAccount($_POST["fname"], $_POST["email"], $_POST["pwd"], $_POST["usertype"]);

    echo $result;
    exit();
}


//For Login
if (isset($_POST["login_email"]) AND isset($_POST["login_pwd"])) {
    $user = new User();
    $result = $user->userLogin($_POST["login_email"], $_POST["login_pwd"]);

    echo $result;
    exit();
}

//To Get Category 
if (isset($_POST["getCategory"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("categories");

    foreach ($rows as $row) {
        echo "<option value='".$row["category_id"]."'>".$row["category_name"]."</option>";
    }
    exit();
}

//To Get Brand 
if (isset($_POST["getBrand"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("brands");

    foreach ($rows as $row) {
        echo "<option value='".$row["brand_id"]."'>".$row["brand_name"]."</option>";
    }
    exit();
}



//Add Categroy
if (isset($_POST["category_name"]) AND isset($_POST["parent_category"])) {
    $obj = new DBOperation();
    $result = $obj->addCategory($_POST["parent_category"], $_POST["category_name"]);
    echo $result;
    exit();
}


//Add Brand
if (isset($_POST["brand_name"])) {
    $obj = new DBOperation();
    $result = $obj->addBrand($_POST["brand_name"]);
    echo $result;
    exit();
}


//Add Product
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
    $obj = new DBOperation();
    $result = $obj->addProduct($_POST["select_category"], $_POST["select_brand"], $_POST["product_name"], $_POST["product_price"], $_POST["product_stock"], $_POST["added_date"]);
    echo $result;
    exit();
}


//Manage Categroy
if (isset($_POST["manageCategory"])) {
    $mg = new Manage();
    $result = $mg->manageRecordWithPagination("categories", $_POST["pageNum"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];

    if (count($rows) > 0) {
        $n = (($_POST["pageNum"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["Category"]; ?></td>
                <td><?php echo $row["Parent"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['category_id']; ?>" class="btn btn-danger btn-sm delete_cat"><i class="fas fa-trash">&nbsp;</i>Delete</a>
                    <a href="#" data-toggle="modal" data-target="#category" eid="<?php echo $row['category_id']; ?>" class="btn btn-info btn-sm edit_cat">Edit</a>
                </td>
            </tr>
        <?php
        $n++;
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete Records
if (isset($_POST["deleteCategory"])) {
    $mg = new Manage();
    $result= $mg->deleteRecord("categories", "category_id" ,$_POST["id"]);
    echo $result;
}

//Get Records For Update
if (isset($_POST["updateCategory"])) {
    $mg = new Manage();
    $result = $mg->getSingleRecord("categories", "category_id", $_POST["id"]);
    echo json_encode($result);
    exit();
}


// Update Records
if (isset($_POST["update_category_name"])) {
    $mg = new Manage();
    $id = $_POST["category_id"];
    $name = $_POST["update_category_name"];
    $parent = $_POST["parent_category"];
    $result = $mg->updateRecord("categories", ["category_id"=>$id], ["parent_category" =>$parent, "category_name"=>$name, "status"=>1]);
    echo $result;
}


// ------------- BRand Management --------------------------


//Manage Brand
if (isset($_POST["manageBrand"])) {
    $mg = new Manage();
    $result = $mg->manageRecordWithPagination("brands", $_POST["pageNum"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];

    if (count($rows) > 0) {
        $n = (($_POST["pageNum"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['brand_id']; ?>" class="btn btn-danger btn-sm delete_brand"><i class="fas fa-trash">&nbsp;</i>Delete</a>
                    <a href="#" data-toggle="modal" data-target="#brand" eid="<?php echo $row['brand_id']; ?>" class="btn btn-info btn-sm edit_brand">Edit</a>
                </td>
            </tr>
        <?php
        $n++;
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete Brands
if (isset($_POST["deleteBrand"])) {
    $mg = new Manage();
    $result= $mg->deleteRecord("brands", "brand_id" ,$_POST["id"]);
    echo $result;
}



//Get Records For Brand Update
if (isset($_POST["updateBrand"])) {
    $mg = new Manage();
    $result = $mg->getSingleRecord("brands", "brand_id", $_POST["id"]);
    echo json_encode($result);
    exit();
}



// Update Brands
if (isset($_POST["update_brand_name"])) {
    $mg = new Manage();
    $id = $_POST["brand_id"];
    $name = $_POST["update_brand_name"];
    $result = $mg->updateRecord("brands", ["brand_id"=>$id], ["brand_name"=>$name, "status"=>1]);
    echo $result;
}
