<?php

/*
 * created by arcady.1254@gmail.com 19/3/2012
 */
include 'classes/User.php';

include 'classes/Games.php';

include 'classes/Game.php';

include 'classes/Tasks.php';

include 'classes/Elements.php';

include 'classes/Element.php';
 
 if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();    
}

//print_r($_SESSION);
//echo "<br/>";
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

include 'action/connect.php';

include 'action/quotesmart.php';

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}

 
switch ($attributes[act]) {
    case 'main':
        $title = "MAIN";
        if(isset ($_SESSION[auth]) && $_SESSION[auth] == 1){ 
            include 'controller/setting_main.php'; 
        }
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/main.php';
        break;
    
    case 'rmail':
        $title = 'KABINET';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/regmail.php';
        break;
    
    case 'addm':
        include 'action/add_email.php';
        break;
    
    case 'chngus':
        include 'action/change_user.php';
        break;
    
    case 'addus':
        include 'action/add_user.php';
        break;
//    cabinet
    case 'regu':
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/about_me.php';
        break;
    
    case 'vote':
        include 'main/header.php';  
        include 'action/vote.php';
        break;
    
    case 'avote':        
        include 'action/vote_automatic.php';
        break;
    
    case 'onauto':
        include 'action/onauto.php';
        break;
    
    case 'addrow':
        include 'action/addrow_auto.php';
        break;
     
    case 'setvote':
        include 'query/auto_vote.php'; 
        include 'main/header.php';
        include 'main/selector.php'; 
        include 'main/setting_vote.php';
        break;
    
    case 'chngvote':
        include 'action/setting_vote.php'; 
        break;
    
    case 'auth':
        include 'main/header.php';
        include 'query/authentication.php';
        break;
    
    case 'stat':  
        include 'query/statistics.php';
        include 'main/header.php';  
        include 'main/statistics.php';
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
