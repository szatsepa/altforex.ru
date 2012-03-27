<?php

/*
 * created by arcady.1254@gmail.com 27/3/2012
 */
 
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
?>
