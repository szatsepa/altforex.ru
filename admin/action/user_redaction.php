<?php

/*
 * crated by arcady.1254@gmail.com 28/3/2012
 */

$user_id = intval($attributes[uid]);

$status = intval($attributes[status]);

$cash = quote_smart($attributes[cash]);

$query = "UPDATE my_account SET cash = (cash + $cash), level = $status WHERE user_id = $user_id";

mysql_query($query) or die($query);

$num_a = mysql_affected_rows();

 ?>
