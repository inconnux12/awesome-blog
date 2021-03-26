<?php
require "connection.php";
require "const.php";
if(isset($_POST)){
    $desc=$con->real_escape_string($_POST['desc_pub']);
    $cont=$con->real_escape_string($_POST['cont_pub']);
    $query="update publications set title_pub='".$_POST['title_pub']."' , desc_pub='".$desc."' , cont_pub='".$cont."' , id_cat='".$_POST['id_cat']."' where id_pub='".$_GET['id']."'";
    if($con->query($query)){
        header('Location: '.DIR.'posts/pub');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}