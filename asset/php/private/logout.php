<?php
session_start();
unset($_SESSION['login']);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/blog/login');
exit();
?>