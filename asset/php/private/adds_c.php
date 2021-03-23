<?php
require "connection.php";
if(isset($_POST)){
    $query="insert into categorie (name_cat) values('".$_POST['name_cat']."')";
    if($con->query($query)){
        header('Location: /blog/posts/cat');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}