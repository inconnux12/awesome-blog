<?php
if($action=='pub'){
    if(isset($_POST)){
        $desc=$con->real_escape_string($_POST['desc_pub']);
        $cont=$con->real_escape_string($_POST['cont_pub']);
        $query="update publications set title_pub='".$_POST['title_pub']."' , desc_pub='".$desc."' , cont_pub='".$cont."' , id_cat='".$_POST['id_cat']."' where id_pub='".$id."'";
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