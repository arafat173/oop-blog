<?php
    namespace App\classes;

    class Database{
        public function dbCon(){
            $host = 'localhost';
            $user = 'rahman';
            $password = '1234';
            $db = 'blog';
            $link =  mysqli_connect($host,$user,$password,$db);
            return $link;
        }
    }
?>