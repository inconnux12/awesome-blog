<?php
require "connection.php";
if(isset($_POST)){
    $query="update publications set title_pub='".$_POST['title_pub']."' , desc_pub='".$_POST['desc_pub']."' , cont_pub='".$_POST['cont_pub']."' , id_cat='".$_POST['id_cat']."' where id_pub='".$_GET['id']."'";
    if($con->query($query)){
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/blog');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}