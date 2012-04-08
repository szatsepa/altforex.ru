<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

// Проверка аутентификации

if(!isset ($user)){
    
    $user = new User();
    
    $games = new Games();

if (isset($_SESSION[auth]) and !isset($attributes[out])) {
	
    $user_id = $_SESSION[id];
    
       if($_SESSION[auth] == 1){

           $user->setUser($user_id);

           $games->setGames($user->data[level]);

       }
     
    }

    if(!($user->data[id])){
        $_SESSION[auth] = 0;
        unset($_SESSION[id]);
        unset($_COOKIE[di]); 
    }
}
?>
