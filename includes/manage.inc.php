<?php

class Manage 
{
    private $conn;

    public function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->conn = $db->connect();
    }


    
    public function manageRecordWithPagination($table, $page_num) {
        $a = $this->pagination($this->conn, $table, $page_num, 5);
        if ($table == "categories") {
            $sql = "SELECT p.category_name AS Category, c.category_name AS Parent, p.status, p.category_id FROM categories p LEFT JOIN categories c ON p.parent_category=c.category_id ".$a["limit"];
        }
        $result = $this->conn->query($sql) or die($this->conn->error);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows"=>$rows, "pagination"=>$a["pagination"]];
    }


    private function pagination($conn, $table, $page_num, $n) {
        $query = $conn->query("SELECT COUNT(*) AS 'rows' FROM ".$table);
        $row = mysqli_fetch_assoc($query);
        $pageNum = $page_num;
        $numberOfRecordsPerPage = $n;
    
        $lastPage = ceil($row["rows"]/$numberOfRecordsPerPage);
    
        //echo "Total Pages ".$lastPage."<br>";
    
        $pagination = "<ul class='pagination'>";
    
        if ($lastPage != 1) {
            if ($pageNum > 1) {
                $previous = "";
                $previous = $pageNum - 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#'> Previous </a></li>";
            }
            for ($i=$pageNum - 5; $i< $pageNum ; $i++) { 
                if ($i > 0) {
                    $pagination .="<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
                }
            }
    
            $pagination .="<li class='page-item'><a class='page-link' pn='".$pageNum."' href='#' style= color:#333;> $pageNum </a></li>";
    
            for ($i=$pageNum + 1; $i<= $lastPage; $i++) {
                $pagination .="<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
                if ($i > $pageNum + 4) {
                break;
                }
            }
            if ($lastPage > $pageNum) {
                $next = $pageNum + 1;
                $pagination .="<li class='page-item'><a class='page-link' pn='".$next."' href='#' style=color:#333;> Next </a></li></ul>";
            }
        }
    
        //lIMIT 0,10
        //LIMIT 20,10
        $limit = "LIMIT ".($pageNum - 1) * $numberOfRecordsPerPage."," .$numberOfRecordsPerPage;
    
        return ["pagination"=>$pagination, "limit"=>$limit];
    }

    /*

    Delete Records

    */
    public function deleteRecord($table, $pk, $id) {
        if ($table == "categories") {
            $stmt = $this->conn->prepare("SELECT ".$id." FROM categories WHERE parent_category = ? ");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result() or die($this-$conn->error);

            if ($result->num_rows > 0) {
                return "DEPENDENT_CATEGORY";
            } else {
               $stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
               $stmt->bind_param("i",$id);
               $result = $stmt->execute() or die($this->conn->error);

               if ($result) {
                   return "CATEGORY_DELETED";
               }
            }
        } else {
            $this->conn->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
            $stmt->bind_param("i",$id);
            $result = $stmt->execute() or die($this->conn->error);

            if ($result) {
                return "DELETED";
            }
        }
    }

    //Rrtireve Record For Editing
    public function getSingleRecord($table, $pk, $id) {
        $stmt = $this->conn->prepare("SELECT * FROM ".$table." WHERE ".$pk." =? LIMIT 1");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die($this->conn->error);
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }



    //Update Record
    public function updateRecord($table,$where,$fields){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
        if(mysqli_query($this->conn,$sql)){
            return "UPDATED";
        }
    }
    
    


}

//$obj = new Manage();
//echo $obj->deleteRecord("categories","category_id", 16);
//echo "<pre>";
//print_r($obj->manageRecordWithPagination("categories",1));
//print_r($obj->getSingleRecord("categories", "category_id", 2));
//echo $obj->updateRecord("categories", ["category_id"=>2], ["parent_category" =>0, "category_name"=>"Electronics", "status"=>1]);