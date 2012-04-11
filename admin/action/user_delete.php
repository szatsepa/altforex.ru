<?php

/*
 * created by arcady.1254@gmail.com 28/3/2012
 */

$user_id = intval($attributes[uid]);

$query = "UPDATE users SET activ = 0 WHERE id = $user_id";

$result = mysql_query($query) or die($query);

//echo "$query";

header("location:index.php?act=players");
?>
