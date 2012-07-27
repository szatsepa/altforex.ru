<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'classes/User.php';

include 'query/connect.php';

if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}

if(!isset($_SESSION)){

    session_start();    
}

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}

include 'main/header.php';

switch ($attributes[act]) {
    case 'main':
        include 'main/main.php';
        break;
    
    case "logout": 
        include 'action/logout.php';
        break;

    
    default :
        header("location:?act=main");
        break;
}

include 'main/footer.php';

mysql_close();
?>
