<?php
require "connection.php";
session_start();
$sql="select * from markbook";
$result = $con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        if($_GET['id']==$row['id_pub']&& $_SESSION['user_id']==$row['user_id']){
            $query="delete from markbook where id_pub='".$_GET['id']."'and user_id='".$_SESSION['user_id']."'";
            $con->query($query);
            echo '0';
            exit();
        }
        else{
            $query="insert into markbook (id_pub,user_id) values('".$_GET['id']."','".$_SESSION['user_id']."')";
            if($con->query($query)){
            echo '1';
            exit();
            }
            else{
            echo $con->error;
            }
        }
    }
}
else{
    $query="insert into markbook (id_pub,user_id) values('".$_GET['id']."','".$_SESSION['user_id']."')";
    if($con->query($query)){
    echo '1';
    exit();
    }
    else{
    echo $con->error;
    }
}

$con->close();