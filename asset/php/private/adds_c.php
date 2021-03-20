<?php
require "connection.php";
if(isset($_POST)){
    $query="insert into categorie (name_cat) values('".$_POST['name_cat']."')";
    if($con->query($query)){
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/blog/displays.php?type=cat');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}