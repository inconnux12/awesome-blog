<?php

define("ROOT",$_SERVER['DOCUMENT_ROOT']);
define("DIRNAME",explode('/',$_SERVER['PHP_SELF'])[1]);
define("HOST",'http://'.$_SERVER['HTTP_HOST'].'/'.DIRNAME.'/');
define("DIR",ROOT.'/'.DIRNAME.'/');
define("MODEL",DIR.'Model/');
define("VUE",DIR.'Vue/');
define("CONTROLLER",DIR.'Controller/');
define("ASSETS",HOST.'assets/');