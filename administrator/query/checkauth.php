<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

// Проверка аутентификации

if(!isset ($user)){
    
    $user = new Admin();

if (isset($_SESSION[auth]) and !isset($attributes[out])) {
	
    $user_id = $_SESSION[id];
    
       if($_SESSION[auth] == 1){

           $user->setAdmin($user_id);

       }
     
    }

    if(!($user->id)){
        $_SESSION[auth] = 0;
        unset($_SESSION[id]);
        unset($_COOKIE[di]); 
    }
}
?>
