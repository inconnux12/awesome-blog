<?php
require "connection.php";
if(isset($_POST)){
    $query="insert into publications(title_pub,desc_pub,cont_pub,id_cat) values('".$_POST['title_pub']."' , '".$_POST['desc_pub']."' , '".$_POST['cont_pub']."' , '".$_POST['id_cat']."')";
    if($con->query($query)){
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/blog/displays.php?type=pub');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}