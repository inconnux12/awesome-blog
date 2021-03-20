<?php
$db_server="localhost";
$db_username="root";
$db_password="";
$db_dbname="blog";

$con=new mysqli($db_server,$db_username,$db_password,$db_dbname);

if($con->connect_error){
    die();
}
