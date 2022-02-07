<?php

namespace App\classes;
use App\classes\Database;
class Login{
    public function loginCheck($data){
        $username = $data['username'];
        $password = md5($data['password']);

       
        $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
        $result= mysqli_query(Database::dbCon(),$sql);

        if($result){
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['user_id']=$row['id'];
                $_SESSION['username']=$row['username'];
                $_SESSION['name']=$row['name'];

                header("Location:index.php");
            }else{
                $login_error = "Email or Password is invalid";
                return $login_error;
            }
        }
        else{
            die();
        }
    }
}



?>