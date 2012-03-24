<?php

/*
 * created by arcady.1254@gmail.com 21/3/2012
 */

$vote_array = _readVote();

$vote = NULL;

foreach ($vote_array as $value) {
    
    if($value >= 10)$vote = _restartVote($vote_array);
    
}

if($vote && $vote > 0){ 
    
    $vote_array = _readVote ();
    
    _game_results($vote);
    
    }
    


function _readVote(){
    
    $vote_array = array();
    
    $query = "SELECT e.id, e.start_vote, e.square, e.circle, e.triangle FROM `election` AS e";

    $result = mysql_query($query) or die($query);

    $vote_array = mysql_fetch_assoc($result);

    mysql_free_result($result);
    
    return $vote_array;
}
function _restartVote($arr){ 
    
     $query = "INSERT INTO election_archiv (date_event, square, circle, triangle) VALUES (now(), $arr[square], $arr[circle],$arr[triangle])";
     
     $result = mysql_query($query) or die ($query);
     
     $id = mysql_insert_id();
     
     if($id){
         $query = "UPDATE election SET square = 0, circle = 0, triangle = 0";
         
         mysql_query($query) or die ($query);
     }
     return $id;
}
function _game_results($id){
   /* формула первая самая простая:
    * шаг игры один голос за одну фигуру:
    * раунд заканчивается в тот момент когда одна из фигур набирает  100 голосов
    * фигура набравшая меньше всего очков считается "выигравшей раунд"
    * игрокам кто за нее голосовал количество отданных голосов возвращается в двойном размере
    * Фигура набравшая больше всего очков считается "проигравшей раунд"
    * все голоса отданные за нее остаются в кассе оператора игры
    * Фигура между выигравшей и проигравшей в статусе "при своих" все голоса за эту фигуру возвращаются игрокам обратно
    */
    $query = "SELECT user_id FROM `rate` WHERE election_id = (SELECT MAX(id) FROM election_archiv) GROUP BY user_id";
    
    $result = mysql_query($query) or die ($query);
    
    $user_array = array();
    
    $user_rate = array();
    
    $square = 0;
    
    $circle = 0;
    
    $triangle = 0;
    
    while ($var = mysql_fetch_row($result)){
        
        array_push($user_array, $var[0]);
        
    }
    
    
    
    foreach ($user_array as $value) { 
        
        $game_results = array();
    
    $query = "SELECT u.id AS user_id,
                    f.name AS figures,
                    f.id AS f_id,
                    r.point                      
                FROM `election_archiv` AS e 
                JOIN `figures` AS f 
                JOIN `rate` AS r 
                JOIN `users` AS u 
                ON r.election_id  = (SELECT MAX(id) FROM election_archiv)
                AND r.figure_id = f.id 
                AND u.id = $value
                AND r.user_id = u.id
        ORDER BY f.id";
    
    $result = mysql_query($query) or die ($query);
    
    while ($var = mysql_fetch_assoc($result)){
        
        array_push($game_results, $var);
        
        if($var[figures] == 'square')$square += $var[point];
        if($var[figures] == 'circle')$circle += $var[point];
        if($var[figures] == 'triangle')$triangle += $var[point];
        
        } 
        
        array_push($user_rate, $game_results);
        
    }
    
    $summ_array = array('square'=>$square,'circle'=>$circle, 'triangle'=>$triangle);
    
    arsort($summ_array);
    
    $loss = each($summ_array);
    
    $standoff = each($summ_array);
    
    $prize = each($summ_array);
    
    for($i = 0;$i < count($user_rate);$i++){
            foreach ($user_rate[$i] as $key => $value) { 

                 if($value[figures] == $standoff[0]){

                     _back_points($value[user_id], $value[point], 1);
                 }
                if($value[figures] == $prize[0]){

                    _back_points($value[user_id], $value[point], 2);
                 }
         }
    }
    

}
function _back_points($user_id, $points, $qw){
    
    $cash = $points*$qw;
    
    $query = "UPDATE my_account SET cash = (cash + $cash) WHERE user_id = $user_id";
    
    $result = mysql_query($query) or die ($query);
    
    $num_aff = mysql_affected_rows();
    
    return $num_aff;
}
?>
