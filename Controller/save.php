<?php
$sql="SELECT COUNT(1) FROM markbook WHERE id_pub='".$id."' AND user_id='".$_SESSION['user_id']."'";
$result = $con->query($sql);
$exist=0;
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        if((int)$row['COUNT(1)']>0){
            $query="delete from markbook where id_pub='".$id."'and user_id='".$_SESSION['user_id']."'";
            $con->query($query);
            echo 'supprimer';
        }
        else{
            $query="insert into markbook (id_pub,user_id) values('".$id."','".$_SESSION['user_id']."')";
            $con->query($query);
            echo 'ajouter';
        }
    }

}
else{
    $query="insert into markbook (id_pub,user_id) values('".$id."','".$_SESSION['user_id']."')";
    if($con->query($query)){
        echo 'ajouter vide';
        exit();
    }
    else{
    echo $con->error;
    }
}

$con->close();