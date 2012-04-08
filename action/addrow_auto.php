<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */

$user_id = $user->data[id];

$query = "INSERT INTO user_task (user_id,auto,level) VALUES ($user_id, 0, 1)";

mysql_query($query);

header("location:index.php?act=setvote");
?>
