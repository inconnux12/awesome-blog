<?php
require "connection.php";
require "const.php";
if(isset($_POST)){
    $query="update categorie set name_cat='".$_POST['name_cat']."' where id_cat='".$_GET['id']."'";
    if($con->query($query)){
        header('Location: /'.DIR.'/posts');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}