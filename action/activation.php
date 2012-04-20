<?php

/*
 * created by arcady.1254@gmail.com 20/4/2012
 */
 $pwd = quote_smart($attributes[pwd]);
 
 $query = "UPDATE users SET activ = 1 WHERE key_code = $pwd";
 
 mysql_query($query) or die ($query);
?>
