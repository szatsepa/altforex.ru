<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */

$user_id = $user->data[id];

$query = "SELECT t.id, 
                 t.round, 
                 t.count, 
                 t.figure_id, 
                 f.name,
                 t.auto,
                 t.level
            FROM user_task AS t 
            LEFT JOIN figures AS f 
            ON  t.figure_id = f.id
            WHERE t.user_id = $user_id 
            ORDER BY t.id";

$result = mysql_query($query) or die($query);

$num_rows = mysql_num_rows($result);

if($num_rows == 0){
    mysql_query("INSERT INTO user_task (user_id) VALUES ($user_id)");
    header("location:index.php?act=setvote");
}else{

$auto_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($auto_array, $var);
}

mysql_free_result($result);

$user->tasks->setVote($auto_array);

unset ($auto_array);

}
?>
