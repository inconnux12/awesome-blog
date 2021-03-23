<?php
session_start();
require "const.php";
unset($_SESSION['login']);
echo DIR;
header('Location: /'.DIR);
exit();
?>