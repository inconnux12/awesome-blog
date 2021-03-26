<?php

session_start();
if($action=='login'){
    $sql="select user_id,password,role from users where user_l_name='".$_POST['user_l_name']."'";
    $result = $con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            if($_POST['password']==$row['password']){
                $_SESSION['login']=true;
                $_SESSION['user_id']=$row['user_id'];
                if((int)$row['role']){
                    $_SESSION['role']=true;
                }
                else{
                    $_SESSION['role']=false;
                }
                header('Location: '.HOST);
                exit();
            }
            else{
                $_SESSION['error']=true;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        
    }    
}
elseif($action=='register'){
    if(isset($_POST['role']))
        $role=1;
    else
        $role=0;
    $query="insert into users(user_f_name,user_l_name,mail,password,role) values('".$_POST['user_f_name']."' , '".$_POST['user_l_name']."' , '".$_POST['mail']."' , '".$_POST['password']."' , '".$role."')";
    if($con->query($query)){
        session_start();
        $_SESSION['register']=1;
        header('Location: '.HOST.'login');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();    
}
elseif($action=='logout'){
    unset($_SESSION['login']);
    header('Location: '.HOST);
    exit();
}
