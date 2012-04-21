<?php

/*
 * created by arcady.1254@gmail.com 21/4/2012
 */

$id = intval($attributes[rid]);

$query = "SELECT e.id, u.name, u.surname, f.name AS figure, r.point, r.time 
            FROM rate AS r, election AS e, users AS u, figures AS f 
            WHERE e.id=$id 
            AND r.election_id = e.id 
            AND r.user_id = u.id 
            AND r.figure_id = f.id
            ORDER BY r.time DESC";

$steps_array = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($steps_array, $var);
}

mysql_free_result($result);

?>
