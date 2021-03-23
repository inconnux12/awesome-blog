<?php
require "connection.php";
$query="delete from categorie where id_cat='".$_GET['id']."'";
if($con->query($query)){
    header('Location: /blog');
    exit;
}
else{
    echo $con->error;
}
$con->close();
