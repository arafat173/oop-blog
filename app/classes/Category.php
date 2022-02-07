<?php
namespace App\classes;
use App\classes\Database;

 class Category{
     public function addCategory($data){
         $category_name = $data['category_name'];
         $status = $data['status'];
         $result = mysqli_query(Database::dbCon(),"INSERT INTO `category`( `category_name`, `status`) VALUES ('$category_name','$status')");
         if($result){
             $insertMsg = "Category Save Successfully.";
             return $insertMsg;
         }else{
            $insertMsg = "Category Not Save.";
            return $insertMsg;
         }
        }
     public function updateCategory($data){
         $category_name = $data['category_name'];
         $status = $data['status'];
         $id = $data['id'];
         $result = mysqli_query(Database::dbCon(),"UPDATE `category` SET `category_name`='$category_name', `status`='$status' WHERE `id`='$id'");
         if($result){
             header('Location:edit-category.php?id='.$id);
         }else{
            header('Location:edit-category.php?id='.$id);

         }


     }

     public function selectRow($id=''){
       return mysqli_query(Database::dbCon(),"SELECT * FROM `category`WHERE `id`=$id");
       
     }
     public function allCategory(){
        $result = mysqli_query(Database::dbCon(),"SELECT * FROM `category`");
        return $result;
     }
     public function allActiveCategory(){
       return mysqli_query(Database::dbCon(),"SELECT * FROM `category` WHERE `status`=1");
        
     }
     public function allActivePost(){
       return mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `status`=1 order by `id` desc");
        
     }
     public function searchPost($text){
       return mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `content` LIKE '%$text%' AND `status`=1 order by `id` desc");
        
     }
     public function catPost($id){
       return mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `status`=1 AND `cat_id`='$id'");
        
     }
     public function active($id){
        mysqli_query(Database::dbCon(),"UPDATE `category` SET `status`=1 WHERE`id`='$id'");
     }
     public function inactive($id){
        mysqli_query(Database::dbCon(),"UPDATE `category` SET `status`=0 WHERE`id`='$id'");
     }
     public function delete($id){
        mysqli_query(Database::dbCon(),"DELETE FROM `category` WHERE`id`='$id'");
     }
     public function singlePost($id){
      return mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `id`=$id");

     }
 }



?>