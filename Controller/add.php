<?php

if($action=='cat'){
    $errors=[];
    if(empty($_POST['name_cat'])){
        $errors['name_cat']="le champ est VIDE";
    }
    if(count($errors)==0){
        $query="insert into categorie (name_cat) values('".$_POST['name_cat']."')";
        if($con->query($query)){
            header('Location: '.HOST.'posts/cat');
            exit;
        }
        else{
            echo $con->error;
        }
        $con->close();
    }
    else{
        $_SESSION['errors']=$errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }
}
elseif($action=='pub'){
    $error=[];
    if(isset($_POST)){
        require CONTROLLER."slugify.php";
        if(empty($_POST['title_pub'])){
            $error['title_pub']="le champ est VIDE";
        }
        if(empty($_POST['title_pub'])){
            $error['title_pub']="le champ est VIDE";
        }
        if(empty($_POST['title_pub'])){
            $error['title_pub']="le champ est VIDE";
        }
        if(empty($_POST['id_cat'])){
            $error['id_cat']="veillez choisir la categorie";
        }
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
        if(count($error)==0){
            $title=$con->real_escape_string($_POST['title_pub']);
            $desc=$con->real_escape_string($_POST['desc_pub']);
            $cont=$con->real_escape_string($_POST['cont_pub']);
            $id_cat=$_POST['id_cat'];
            $insert_data = implode("-", $_POST['tags_pub']);
            if(empty($file_name)){
                $file_name="publish2.jpg";
            }
            $query="insert into publications(title_pub,desc_pub,cont_pub,img_pub,tags_pub,slug,id_cat) values('".$title."' , '".$desc."' , '".$cont."' , '".$file_name."' , '".$insert_data."','".$slugify($title)."','".$id_cat."')";
            if($con->query($query)){
                header('Location: '.HOST.'posts/pub');
                exit;
            }
            else{
                echo $con->error;
            }
            $con->close();
        }
        else{
            $_SESSION['errors']=$error;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}