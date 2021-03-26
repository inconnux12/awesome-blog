<?php
require "connection.php";
require "const.php";
$query="delete from publications where id_pub='".$_GET['id']."'";
if($con->query($query)){
    header('Location: '.DIR);
    exit;
}
else{
    echo $con->error;
}
$con->close();
