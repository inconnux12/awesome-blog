<?php 
session_start();

define("DIR",explode('index.php',$_SERVER['PHP_SELF'])[0]);
define("SUBDIR",explode('/',$_SERVER['PHP_SELF'])[1]);

require "vendor/autoload.php"; 
require "asset/php/private/connection.php";
require "asset/php/private/slugify.php";

$router=new AltoRouter();
$router->setBasePath("/".SUBDIR);
$router->map('GET','/',function() use($con){
    require "asset/php/pages/home.php";
});
$router->map('GET','/tags/[:action]',function($action) use($con){
    require "asset/php/pages/home.php";
});
$router->map('GET','/login',function() use($con){
    require "asset/php/pages/login.php";
});
$router->map('GET','/register',function() use($con){
    require "asset/php/pages/register.php";
});
$router->map('GET','/posts/[a:action]',function($action) use($con){
    if(isset($_SESSION['login'])){
        if(isset($_SESSION['role'])&&$_SESSION['role']){
            require "asset/php/pages/displays.php";
        }
    }
    else{
        header('Location:'.DIR);   
    }

});
$router->map('GET','/posts/add/[a:action]',function($action) use($con){
    if(isset($_SESSION['login'])){
        if(isset($_SESSION['role'])&&$_SESSION['role']){
            require "asset/php/pages/add.php";
        }
    }
    else{
        header('Location:'.DIR);   
    }

});
$router->map('GET','/posts/mod/[a:action]/[i:id]',function($action,$id) use($con){
    if(isset($_SESSION['login'])){
        if(isset($_SESSION['role'])&&$_SESSION['role']){
            require "asset/php/pages/mody.php";
        }
    }
    else{
        header('Location:'.DIR);   
    }

});
$router->map('GET','/bookmarks',function() use($con){
    if(isset($_SESSION['login'])){
        require "asset/php/pages/bookmarks.php";
    }
});
$router->map('GET','/post/[:action]',function($action) use($con){
    require "asset/php/pages/article.php";
});
$match = $router->match();
if( is_array($match) ) {
    if(is_callable( $match['target'] ) )
	    call_user_func_array( $match['target'], $match['params'] ); 
    else{
        echo "error 404";
    }
}


