<?php
require "connection.php";
if(isset($_POST['role']))
    $role=1;
else
    $role=0;
$query="insert into users(user_f_name,user_l_name,mail,password,role) values('".$_POST['user_f_name']."' , '".$_POST['user_l_name']."' , '".$_POST['mail']."' , '".$_POST['password']."' , '".$role."')";
if($con->query($query)){
    session_start();
    $_SESSION['register']=1;
    header('Location: /blog/login');
    exit;
}
else{
    echo $con->error;
}
$con->close();