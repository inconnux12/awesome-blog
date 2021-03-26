<?php 
session_start();

require "config.php";
require "vendor/autoload.php"; 
require CONTROLLER."connection.php";
require CONTROLLER."slugify.php";

$router=new AltoRouter();
$router->setBasePath("/".DIRNAME);
$router->map('GET','/',function() use($con){
    require VUE."home.php";
});
$router->map('GET','/tags/[:action]',function($action) use($con){
    require VUE."home.php";
});
$router->map('GET','/login',function() use($con){
    require VUE."login.php";
});
$router->map('GET','/register',function() use($con){
    require VUE."register.php";
});
$router->map('GET','/posts/[a:action]',function($action) use($con){
    if(isset($_SESSION['login'])){
        if(isset($_SESSION['role'])&&$_SESSION['role']){
            require VUE."displays.php";
        }
    }
    else{
        header('Location:'.HOST);   
    }

});
$router->map('GET','/posts/add/[a:action]',function($action) use($con){
    if(isset($_SESSION['login'])){
        if(isset($_SESSION['role'])&&$_SESSION['role']){
            require VUE."add.php";
        }
    }
    else{
        header('Location:'.HOST);   
    }

});
$router->map('GET','/posts/mod/[a:action]/[i:id]',function($action,$id) use($con){
    if(isset($_SESSION['login'])){
        if(isset($_SESSION['role'])&&$_SESSION['role']){
            require VUE."mody.php";
        }
    }
    else{
        header('Location:'.HOST);   
    }

});
$router->map('GET','/bookmarks',function() use($con){
    if(isset($_SESSION['login'])){
        require VUE."bookmarks.php";
    }
});
$router->map('GET','/post/[:action]',function($action) use($con){
    require VUE."article.php";
});

/**
 * private maps
 */
$router->map('POST|GET','/private/[a:action]',function($action) use($con){
    require CONTROLLER."traitments.php";
});
$router->map('POST|GET','/private/add/[a:action]',function($action) use($con){
    require CONTROLLER."add.php";
});
$router->map('POST|GET','/private/mody/[a:action]/[i:id]',function($action,$id) use($con){
    require CONTROLLER."mody.php";
});
$router->map('POST|GET','/private/supp/[a:action]/[i:id]',function($action,$id) use($con){
    require CONTROLLER."supp.php";
});
$router->map('POST|GET','/private/search/[a:action]/[a:q]',function($action,$q) use($con){
    require CONTROLLER."search.php";
});
$router->map('POST|GET','/private/bookmark/[i:id]',function($id) use($con){
    require CONTROLLER."save.php";
});
$match = $router->match();
if( is_array($match) ) {
    if(is_callable( $match['target'] ) )
	    call_user_func_array( $match['target'], $match['params'] ); 
    
}
else{
        echo "error 404";
}

