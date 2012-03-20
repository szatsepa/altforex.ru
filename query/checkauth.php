<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

// Проверка аутентификации

if(!isset ($user)){
    
    $user = new User();

if (isset($_SESSION['auth']) and !isset($attributes[out])) {
	
    
    $user_id = $_SESSION['id'];
    
   if($_SESSION[auth] == 1) $user->setUser($user_id);
     
    }
    
    if(!($user->data)){
        $_SESSION[auth] = 0;
        unset($_SESSION[id]);
        unset($_COOKIE[di]);
//        header("location:index.php?act=reg");
    }
}
?>
