<?php
require "connection.php";
$query="delete from publications where id_pub='".$_GET['id']."'";
if($con->query($query)){
    header('Location: /blog');
    exit;
}
else{
    echo $con->error;
}
$con->close();
