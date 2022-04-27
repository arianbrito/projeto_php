<?php

session_start();

define('INCLUDE_PATH', 'http://localhost/projeto_php/');
define('INCLUDE_PATH_PANEL',INCLUDE_PATH.'panel/');
define('BASE_DIR_PANEL',__DIR__);
define('INCLUDE_PATH_CLASS',INCLUDE_PATH.'class/');
define('INCLUDE_PATH_UPLOAD',INCLUDE_PATH.'upload/');

//Conectar ao DB
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','projetophp');

//Funções do painel

function pegaPosition ($position){
    return Panel::$cargos[$position];
}

function selectMenu($par){
    if(isset($_GET['url'])){
    $url = explode('/',@$_GET['url'])[0];
    if($url == $par){
        echo 'class="menu-active"';
        }
    }
}

function menuPermissionVerification($permisson){
    if($_SESSION['position'] >= $permisson){
        return;
    }else{
        echo 'style="display:none"';
    }
}

function pagePermissionVerification($permisson){
    if($_SESSION['position'] >= $permisson){
        return;
    }else{
        include('panel/pages/permission-denied.php');
        die();
    }
}

?>