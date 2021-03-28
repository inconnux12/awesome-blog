<?php

//session_start();
if($action=='login'){
    $errors=[];
    if(empty($_POST['user_l_name'])){
        $errors['l_name']="le champ est VIDE";
    }

    if(empty($_POST['password'])){
        $errors['password']="le champ est VIDE";
    }
    if(count($errors)==0){
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
                        $errors['false']=true;
                    }
                }    
            }
    }
    else{
        $_SESSION['errors']=$errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);  
    }    
    
}
elseif($action=='register'){

    $errors=[];
    $sql="select COUNT(*) from users where user_l_name='".$_POST['user_l_name']."' or mail='".$_POST['mail']."'";
    $res=$con->query($sql);
    while($row=$res->fetch_assoc()){
        if((int)$row['COUNT(*)']>0){
            $errors['exist']="indentifier existe deja !";
        }
        else{
            $f_name=$_POST['user_f_name'];
            $l_name=$_POST['user_l_name'];
            $mail=filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL);
            $password=$_POST['password'];
            $_SESSION['old']=$_POST;
            if(isset($_POST['role']))
                $role=1;
            else
                $role=0;
            if(empty($f_name)){
                $errors['f_name']="le champ est VIDE";
            }
            if(empty($l_name)){
                $errors['l_name']="le champ est VIDE";
            }
        
            if(empty($mail)){
                $errors['mail']="le champ est VIDE";
            }
            if(empty($password)){
                $errors['password']="le champ est VIDE";
            }
        }
        if(count($errors)==0){
            $query="insert into users(user_f_name,user_l_name,mail,password,role) values('".$_POST['user_f_name']."' , '".$_POST['user_l_name']."' , '".$_POST['mail']."' , '".$_POST['password']."' , '".$role."')";
            if($con->query($query)){
                $_SESSION['register']=1;
                echo "nrmlm c bon";
                header('Location: '.HOST.'login');
                exit;
            }
            else{
                echo $con->error;
            }
        }
        else{
            $_SESSION['errors']=$errors;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    $con->close();   
}
elseif($action=='logout'){
    unset($_SESSION['login']);
    header('Location: '.HOST);
    exit();
}
