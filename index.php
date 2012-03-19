<?php

/*
 * created by arcady.1254@gmail.com 19/3/2012
 */
 
 if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();  
}

if($_SESSION[auth] != 1)$_SESSION[auth] = 0;

if(isset($attributes[id])){
         
   $_SESSION[id] = $attributes[id];
   
   $_SESSION[auth] = 1;
         
}

if(isset($attributes[di]) && !isset ($_SESSION[auth])){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = 1;
         
}

include 'classes/User.php';
  
include 'action/connect.php';

include 'action/quotesmart.php';

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}
switch ($attributes[act]) {
    case 'main':
        include 'main/header.php';
        echo "Привет участникам автопробега!!!";
        break;
    
        case "logout":
        include 'action/logout.php'; 
        break;
 
     case 'statistics':
         include 'action/statistics.php';
         break;
     
    default :
        include 'action/redirect.php';
        break;
}
include 'main/footer.php';
mysql_close($link);
?>
