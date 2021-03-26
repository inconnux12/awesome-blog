<?php
if($action=='pub'){
    $query="delete from publications where id_pub='".$id."'";
if($con->query($query)){
    header('Location: '.HOST.'posts/pub');
    exit;
}
else{
    echo $con->error;
}
$con->close();

}
elseif($action=='cat'){
    $query="delete from categorie where id_cat='".$id."'";
    if($con->query($query)){
        header('Location: '.HOST.'posts/cat');
        exit;
    }
    else{
        echo $con->error;
    }
    $con->close();
}