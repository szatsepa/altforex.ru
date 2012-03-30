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
                 t.auto
            FROM user_task AS t 
            LEFT JOIN figures AS f 
            ON t.user_id = $user_id 
            AND t.figure_id = f.id
            ORDER BY t.id";

$result = mysql_query($query) or die($query);

$num_rows = mysql_num_rows($result);

if($num_rows == 0){
    header ("location:index.php?act=regu");
}else{

$auto_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($auto_array, $var);
}

mysql_free_result($result);

}
?>
