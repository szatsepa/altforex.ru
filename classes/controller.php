<?php

/*
 * crated by arcady.1254@gmail.com 30/3/2012
 */

if(!isset ($_SESSION[task]) && isset ($user->data[task]) && $user->data[task]){

    $_SESSION[task] = new Task($user->data[id]);
}
 
if(!isset ($_SESSION[game])){ 

    $_SESSION[game] = new Game();
}

if(!isset ($_SESSION[check])){
    
    $_SESSION[check] = $_SESSION[game]->id;
}

$check = $_SESSION[game]->checkStep($_SESSION[check]); 

echo "$check => ". $user->data[id]." != ".$_SESSION[game]->gamer_id;

if($check == 1 && ($user->data[id]) != $_SESSION[game]->gamer_id){
    
    $_SESSION[task]->_move($user->data[id]);
    
    $_SESSION[check] = $_SESSION[game]->id;
}
//print_r($_SESSION[game]);



?>
