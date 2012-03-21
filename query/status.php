<?php

/*
 * created by arcady.1254@gmail.com 21/3/2012
 */

$vote_array = _readVote();

$vote = NULL;

foreach ($vote_array as $value) {
    
    if($value >= 100)$vote = _restartVote($vote_array);
    
}

if($vote) $vote_array = _readVote ();

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
     return 1;
}
?>
