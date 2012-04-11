<?php

/*
 * created by arcady.1254@gmail.com 27/3/2012
 */
 include '../classes/Admin.php';
 
 include '../classes/Users.php';
 
 include '../classes/Player.php';


 if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();  
}

//print_r($_SESSION);
//echo "-5<br/>";
//print_r($attributes);

if($_SESSION[auth] != 1)$_SESSION[auth] = 0;


if(isset($attributes[id])){
         
   $_SESSION[id] = $attributes[id];
   
   $_SESSION[auth] = 1;
         
}

if(isset($attributes[di]) && !isset ($_SESSION[auth]) && $attributes[di] != ''){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = 1;
         
} 
   
include '../action/connect.php';

include '../action/quotesmart.php';

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}

include 'header.php'; 

switch ($attributes[act]) {
    case 'main':
        include 'main/main.php';
        break;
    
    case 'entry':
        include 'query/authentication.php';
        break;
    
    case 'cab':
        include 'main/main_menu.php';
        break;
    
    case 'players':
        include 'main/main_menu.php'; 
        include 'main/users.php';
        break;
    
    case 'redu':
        include 'query/user.php';
        include 'main/user.php';
        break;
    
    case 'delu':
        include 'action/user_delete.php';
        break;

    case 'statistics':
         include '../action/statistics.php';
         break;
     
    default :
        include '../action/redirect.php';
        break;
}

include '../main/footer.php';

mysql_close($link);
?>
