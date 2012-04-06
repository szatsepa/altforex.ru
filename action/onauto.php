<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */
$auto_on = NULL;

$user_id = $user->data[id];

$auto_on = $user->setAuto();

if($auto_on){
    header("location:index.php?act=regu");
}
?>
