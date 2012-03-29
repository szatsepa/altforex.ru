<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */

$user_id = $user->data[id];

$query = "SELECT t.id, 
                 t.round, 
                 t.count, 
                 t.figure_id, 
                 f.name 
            FROM user_task AS t 
            LEFT JOIN figures AS f 
            ON t.user_id = $user_id 
            AND t.figure_id = f.id";

$result = mysql_query($query) or die($query);

$votes_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($votes_array, $var);
}

mysql_free_result($result);

$auto_array = _getAuto_vote($votes_array);

unset($votes_array);

function _getAuto_vote($votes_array){

    $auto_array = array();
    
    $round = 0;
    
    $n = 0;
    
    foreach ($votes_array as $key => $value) {
    
    
        if((ceil($n/3)-floor($n/3)) == 0){
            if(isset ($tmp_array))array_push ($auto_array, $tmp_array);
            $tmp_array = array('round'=>$value[round],'count'=>$value[count]);
             $round = $value[round];
        }
        if($round == $value[round]){ 
            
            if($value[name] == 'square')$tmp_array['square'] = 1;
            if($value[name] == 'circle')$tmp_array['circle'] = 1;
            if($value[name] == 'triangle')$tmp_array['triangle'] = 1;
        }
         $n++;
          if(count($votes_array) == $n)array_push ($auto_array, $tmp_array);
    }
    return $auto_array;
}
?>
