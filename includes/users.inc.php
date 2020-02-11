<?php

/* 

User Class for account creation and login

*/

class User 
{

    private $conn;

    public function __construct () {

        include_once("../database/db.php");
        $db = new Database();
        $this->conn = $db->connect();
    }

    /*
    
    Check if User already exists

    */
    private function emailExists($email) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute() or die($this->conn->error);

        //Get result
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }


    /*
    
    Register New User

    */
    public function createUserAccount($fullname,$email,$password,$usertype) {

        if ($this->emailExists($email)) {
            return "Email_Already_Exists";
        } else {
            $date = date("Y-m-d");
            $notes = "";

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            //sql stmt
            $stmt = $this->conn->prepare("INSERT INTO `users`(`fullname`, `email`, `password`, `user_type`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss",$fullname,$email,$hashedPwd,$usertype,$date,$date,$notes);

            //Get Result
            $result = $stmt->execute() or die($this->conn-error);
            if ($result) {
                return $this->conn->insert_id;
            } else {
                return "Some_Error";
            }

        }

       
    }

    /*

    User Login Authentication

    */

    public function userLogin($email,$password) {

        //Sql Statement
        $stmt = $this->conn->prepare("SELECT id, fullname, password, last_login FROM users WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute() or die($this->conn->error);

        //Get Result
        $result = $stmt->get_result();
        if ($result->num_rows < 1) {
            return "USER_DOES_NOT_EXISTS";
        } else {
            $row = $result->fetch_assoc();

            //Password Check
            $passwordCheck = password_verify($password, $row['password']);
            if ($passwordCheck == false) {
                return "WRONG_PASSWORD";
            } else {
                //session_start();
                $_SESSION['userId'] = $row['id'];
                $_SESSION['fullName'] = $row['fullname'];
                $_SESSION['lastLogin'] = $row['last_login'];

                //Update User last Login using sql stmt
                $last_login = date("Y-m-d h:m:s");
                $stmt = $this->conn->prepare("UPDATE users SET last_login = ? WHERE email = ?");
                $stmt->bind_param("ss",$last_login,$email);

                $result = $stmt->execute() or die($this->conn->error);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }


    }



}

//$user = new User();
//echo $user->createUserAccount("Dante Frank", "davidfrankoziwo@gmail.com", "dantefrank", "Admin");
//echo $user->userLogin("davidfrankoziwo@gmail.com", "dantefrank");