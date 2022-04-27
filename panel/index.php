<?php
    include('../config.php');
    include_once('../class/Panel.php');

    if(Panel::logado() == false){
        include('login.php');
    }else{
        include('main.php');
    }
    
?>