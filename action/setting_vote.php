<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */

$user_id = $user->data[id];

$id = intval($attributes[row]);

$round = intval($attributes[round]);

$count = intval($attributes[count]);

$figure = intval($attributes[figure]);

$auto = $attributes[activ];

$level = intval($attributes[level]);

//echo "AUTO $auto<br/>";

if(!$auto){
    $auto = 0;
}  else {
    $auto = 1;
}

$query = "UPDATE user_task SET round = $round, count = $count, figure_id = $figure, auto = $auto, level = $level WHERE id = $id";

$result = mysql_query($query) or die($query);

header("location:index.php?act=setvote");
?>
