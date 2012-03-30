<?php

/*
 * crated by arcady.1254@gmail.com 30/3/2012
 */

$user_task = userTask($user->data[id]);

$game_array = gamePosition();
echo "PLAN OF GAMES(STRATEGIYA) ";
print_r($user_task);
echo "<br/> SYGRANO VJE ";
print_r($game_array);

function userTask($user_id){

$query = "SELECT t.id, 
                 t.round, 
                 t.count, 
                 t.figure_id
            FROM user_task AS t 
            WHERE t.user_id = $user_id
            ORDER BY t.id";

$result = mysql_query($query) or die($query);

$tmp_arr = array();

while ($var = mysql_fetch_assoc($result)){ 
    array_push($tmp_arr, $var);
}

return $tmp_arr;

}
function gamePosition(){
    
    $query = "SELECT id, user_id, figure_id, point FROM rate 
                WHERE election_id = ((SELECT MAX( id ) 
                FROM election_archiv )+1)";
    
    $result = mysql_query($query) or die($query);
    
    $step = 0;
    
    $tmp_arr = array();
    
    $tmp_arr_1 = array();

    while ($var = mysql_fetch_assoc($result)){
        $step += $var[point];
        array_push($tmp_arr, $var);
    }

    foreach ($tmp_arr as $value) {   
        $arr = $value;
        $arr['step'] = $step;
        array_push($tmp_arr_1, $arr);
    }

return $tmp_arr_1;
}
?>
