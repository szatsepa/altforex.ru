<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

// Проверка аутентификации

if(!isset ($user)){
    
    $user = new Customer();

if (isset($_SESSION[auth])) {
	
    $user_id = $_SESSION[id];
    
       if($_SESSION[auth] != 0){
           
            $user->setCustomer($user_id);

       }
     
    }

    if(!($user->data[id])){
        unset($_SESSION[auth]);
        unset($_SESSION[id]);
        unset($_COOKIE[di]);
        setcookie("di", '', time()-(3600));
    }
}

?>
