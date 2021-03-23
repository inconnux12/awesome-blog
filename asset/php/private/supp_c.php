<?php
require "connection.php";
require "const.php";
$query="delete from categorie where id_cat='".$_GET['id']."'";
if($con->query($query)){
    header('Location: /'.DIR);
    exit;
}
else{
    echo $con->error;
}
$con->close();
