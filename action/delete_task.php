<?php

/*
 * created by arcady.1254@gmail.com 14/4/2012
 */

$id = intval($attributes[row]);

$query = "DELETE FROM user_task WHERE id = $id";

mysql_query($query) or die($query);

header("location:index.php?act=setvote");
?>
