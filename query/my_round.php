<?php

/*
 * created by arcady.1254@gmail.com 21/4/2012
 */

$user_id = $user->data[id];

$query = "SELECT e.id, e.date_event, e.level 
            FROM rate AS r, election AS e 
            WHERE r.user_id=$user_id 
            AND r.election_id = e.id 
            GROUP BY r.election_id
            ORDER BY e.date_event DESC";

$my_round = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($my_round, $var);
}

mysql_free_result($result);

?>
