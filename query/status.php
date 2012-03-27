<?php

/*
 * created by arcady.1254@gmail.com 21/3/2012
 * 
 * считываем состояние раунда
 */
$with_its = NULL;

$status_game = NULL;


/*
 * правило №2
 */

$vote_array = vote_one();

if($vote_array)$status_game = 1;

if(!$vote_array && !$status_game){
    $vote_array = vote_two ();
    }
    
if($vote_array && !$status_game)$status_game = 2;

if(!$vote_array && !$status_game){
    $vote_array = _readVote();
    }
    
    foreach ($vote_array as $value) {
        
        if($value >= 10)$status_game = 3;
    
}

$vote = NULL;

/*
 * раунд заканчивается в тот момент когда одна из фигур набирает  100 голосов
 * или по правилам №№-2\3
 */
if($vote_array){
    if($status_game)$vote = _restartVote($vote_array);
   
}


/*
 *  если раунд закончен обновляем массив рейтинга фигур
 * и записываем результаты в кошельки игроков
 */
if($vote && $vote > 0){ 
    
    $vote_array = _readVote ();
    
    _game_results($status_game);
    
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


?>
