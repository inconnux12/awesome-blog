<?php
if($action=='pub'){
    if(isset($_POST)){
        if(isset($_FILES['img'])){
            $file_name = $_FILES['img']['name'];
            $file_size =$_FILES['img']['size'];
            $file_tmp =$_FILES['img']['tmp_name'];
            $file_type=$_FILES['img']['type'];
            $file_ext=strtolower(explode('.',$_FILES['img']['name'])[1]);
            $extensions= array("jpeg","jpg","png");
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,DIR.'assets/img/'.$file_name);
            }else{
               print_r($errors);
            }
         }

        $title=$con->real_escape_string($_POST['title_pub']);
        $desc=$con->real_escape_string($_POST['desc_pub']);
        $cont=$con->real_escape_string($_POST['cont_pub']);
        $query="update publications set title_pub='".$title."' , desc_pub='".$desc."' , cont_pub='".$cont."' , id_cat='".$_POST['id_cat']."' where id_pub='".$id."'";
        if($con->query($query)){
            header('Location: '.HOST.'posts/pub');
            exit;
        }
        else{
            echo $con->error;
        }
        $con->close();
    }
}
elseif($action=='cat'){
    if(isset($_POST)){
        $query="update categorie set name_cat='".$_POST['name_cat']."' where id_cat='".$id."'";
        if($con->query($query)){
            header('Location: '.HOST.'posts/cat');
            exit;
        }
        else{
            echo $con->error;
        }
        $con->close();
    }
}