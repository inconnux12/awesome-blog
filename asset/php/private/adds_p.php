<?php
require "connection.php";
require "slugify.php";
if(isset($_POST)){
    $desc=$con->real_escape_string($_POST['desc_pub']);
    $cont=$con->real_escape_string($_POST['cont_pub']);
    $query="insert into publications(title_pub,desc_pub,cont_pub,slug,id_cat) values('".$_POST['title_pub']."' , '".$desc."' , '".$cont."' , '".$slugify($_POST['title_pub'])."','".$_POST['id_cat']."')";
    if($con->query($query)){
        header('Location: /awesome-blog/posts/pub');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}