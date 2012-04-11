<?php

/*
 * created by arcady.1254@gmail.com 28/3/2012
 */

$query = "SELECT u.id, u.name, u.surname, u.email, a.cash, e.name AS status, e.id AS element 
            FROM `users` u, `my_account` a, `elements` e 
            WHERE u.id = a.user_id AND a.element_id = e.id
            AND u.status <> 1
            AND u.activ = 1";

$result = mysql_query($query) or die($query);

$user_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($user_array, $var);
}

mysql_free_result($result);

?>
