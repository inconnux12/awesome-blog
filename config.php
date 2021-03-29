<?php

define("ROOT",$_SERVER['DOCUMENT_ROOT']);
define("DIRNAME",explode('/',$_SERVER['PHP_SELF'])[1]);
define("HOST",'http://'.$_SERVER['HTTP_HOST'].'/'.DIRNAME.'/');
define("DIR",ROOT.'/'.DIRNAME.'/');
define("MODEL",DIR.'Model/');
define("VUE",DIR.'Vue/');
define("CONTROLLER",DIR.'Controller/');
define("ASSETS",HOST.'assets/');
define('CURRENT_TIME',$_SERVER['REQUEST_TIME']+3600);
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}