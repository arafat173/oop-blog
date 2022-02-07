<?php

namespace App\classes;
use App\classes\Database;

class Blog{
    public function addBlog($data){
        $file_name = $_FILES['photo']['name'];
        $fileex = explode('.',$file_name);
        $fileex = end($fileex);
        $file_name = date('Ymdhis').$fileex;
        

        $title = mysqli_real_escape_string(Database::dbCon(),$data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(),$data['content']);
        $status = $data['status'];
        $cat_id = mysqli_real_escape_string(Database::dbCon(),$data['cat_id']);
        $name = $_SESSION['name'];

        $result = mysqli_query(Database::dbCon(),"INSERT INTO `blog`(`cat_id`, `title`, `content`, `photo`, `name`, `status`) VALUES ('$cat_id','$title','$content','$file_name','$name','$status')");
        if($result){
            move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$file_name);
            $insertMsg = "Blog Save Successfully.";
            return $insertMsg;
        }else{
           $insertMsg = "Blog Not Save.";
           return $insertMsg;
        }
       }

       public function updateBlog($data){
        
        

        $title = mysqli_real_escape_string(Database::dbCon(),$data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(),$data['content']);
        $status = $data['status'];
        $cat_id = mysqli_real_escape_string(Database::dbCon(),$data['cat_id']);
        $name = $_SESSION['name'];
        $id = $_POST['id'];

        if($_FILES['photo']['name']== NULL){
            $sql = "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`photo`='$file_name',`name`='$name',`status`='$status' WHERE `id`='$id'";

        }
       else{
        $file_name = $_FILES['photo']['name'];
        $fileex = explode('.',$file_name);
        $fileex = end($fileex);
        $file_name = date('Ymdhis').$fileex;
        $sql = "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`photo`='$file_name',`name`='$name',`status`='$status' WHERE `id`='$id'";
        move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$file_name);

       }
        $result = mysqli_query(Database::dbCon(),$sql);
        if($result){
            header('Location:edit-blog.php?id='.$id);
        }else{
           header('Location:edit-blog.php?id='.$id);

        }


    }

       public function allBlog(){
        $result = mysqli_query(Database::dbCon(),"SELECT `blog`.*, `category`.`category_name` FROM `blog` INNER JOIN `category` ON `blog`.`cat_id` =`category`.`id` ORDER BY `id` DESC;
        ");
        return $result;
     }
     public function active($id){
        mysqli_query(Database::dbCon(),"UPDATE `blog` SET `status`=1 WHERE`id`='$id'");
     }
     public function inactive($id){
        mysqli_query(Database::dbCon(),"UPDATE `blog` SET `status`=0 WHERE`id`='$id'");
     }
     public function delete($id){
        mysqli_query(Database::dbCon(),"DELETE FROM `blog` WHERE`id`='$id'");
     }
     public function selectRow($id=''){
        return mysqli_query(Database::dbCon(),"SELECT * FROM `blog`WHERE `id`='$id'");
        
      }
}


?>