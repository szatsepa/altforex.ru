<?php

/*
 * created by arcady.1254@gmail.com 27/3/2012
 * 
 */
function _readVote(){
    /*
     * основано на общем правиле просто читаем все
     */
    $vote_array = array();
    
    $query = "SELECT e.id, e.start_vote, e.square, e.circle, e.triangle FROM `election` AS e";

    $result = mysql_query($query) or die($query);

    $vote_array = mysql_fetch_assoc($result);

    mysql_free_result($result);
    
    return $vote_array;
}
function vote_one(){
    /*
     * если в раунде голосовали только за одну фигуру
     *  она остается в статусе при своих(with its)
     */
    $with_its = NULL;
    
    $end = NULL;
    
    $query = "SELECT square, circle, triangle FROM election";
    
    $result = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_assoc($result);
    
    $status = 0;
    
    foreach ($row as $value) {

        if($value == 0)$status += 1;
        if($value > 9)$end = 1;
    }

    if($status == 2 && $end){
        
        $with_its = _readVote();
        
    }
    
    return $with_its;

}
function vote_two(){
    /*
     * если в раунде голосуют только за две фигуры (одна из фигур остается нулевой)
     * а одна из двух набирают более чем 75 голосов 
     * раунд прекращается 
     * обе фигуры попалают в статус при своих(with its)
     */
    
    $with_its = NULL;
    
    $query = "SELECT square, circle, triangle FROM election";
    
    $result = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_row($result);
    
    $status = 0;
    
    $status_75 = NULL;
    
    foreach ($row as $value) {
        if($value == 0)$status += 1;
        if($value >= 7)$status_75 = 1;
    }

    if($status == 1 && $status_75){
        
        $with_its = _readVote();
        
    }    
return $with_its;
    
}
function close_game($figures_id, $user_id, $round){
    
    /*
     * Участник может голосовать в рамках одного раунда сколько угодно 
     *   НО - Если участник в этом раунде уже голосовал, он не может голосовать
     *  еще раз, если его голос является закрывающим раунд 
     * (добавленный участником голос или голоса завершат раунд)
     */
    $str_out = NULL;
    
    $query = "SELECT point FROM `rate` WHERE figure_id = $figures_id AND election_id = $round AND user_id = $user_id";
    
    $result = mysql_query($query) or die($query);
    
    $row = mysql_fetch_row($result);
    
    $points = $row[0];
    
    if($points == 9){
        
            $str_out = 1;
     }
     
    return $str_out;
}

function checkCash($id){
    
    $_SESSION[id] = $id;
    
    $query = "SELECT cash FROM my_account WHERE user_id = $id";
    
    $result = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_row($result);
    
    $cash = $row[0];
    
    if($cash <= 0){
        
        mysql_query("UPDATE my_account SET cash = 0 WHERE user_id = $id");
    
    }
    
}
function _game_results($with_its){
   /* формула первая самая простая:
    * шаг игры один голос за одну фигуру:
    * раунд заканчивается в тот момент когда одна из фигур набирает  100 голосов
    * фигура набравшая меньше всего очков считается "выигравшей раунд"
    * игрокам кто за нее голосовал количество отданных голосов возвращается в двойном размере
    * Фигура набравшая больше всего очков считается "проигравшей раунд"
    * все голоса отданные за нее остаются в кассе оператора игры
    * Фигура между выигравшей и проигравшей в статусе "при своих" все голоса за эту фигуру возвращаются игрокам обратно
    * 
    * выбираем список игроков - участников
    */
        
    $query = "SELECT user_id FROM `rate` WHERE election_id = (SELECT MAX(id) FROM election_archiv) GROUP BY user_id";
    
    $result = mysql_query($query) or die ($query);
    /*
     * массив игроков участников
     */
    $user_array = array();
    /*
     * маиссив ставок игроков
     */
    $user_rate = array();
    /*
     * ставки суммы по фигурам
     */
    $square = 0;
    
    $circle = 0;
    
    $triangle = 0;
    
    while ($var = mysql_fetch_row($result)){
        
        array_push($user_array, $var[0]);
        
    }
    
    
    
    foreach ($user_array as $value) { 
        
        $game_results = array();
/*
 * выборка ставок по игрокам и фигурам
 */    
    $query = "SELECT u.id AS user_id,
                    f.name AS figures,
                    f.id AS f_id,
                    r.point                      
                FROM `figures` AS f 
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
    /*
     * проигыш
     */
    $loss = each($summ_array);
    /*
     * типа ничья ставки вертаюццо
     */
    $standoff = each($summ_array);
    /*
     * выигрыш (в смысле фигура\ставка)
     */
    $prize = each($summ_array);
    /*
     * в цыкле обновляем содержимое кошельков игроков участников по ставкам на фигуры
     */
   
    if($with_its == 3){
        echo "loss no return";

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
    }  else {
      
           for($i = 0;$i < count($user_rate);$i++){
            foreach ($user_rate[$i] as $key => $value) { 

                     _back_points($value[user_id], $value[point], 1);
                 
              }
         }
    }

    

}
function _back_points($user_id, $points, $qw){
    /*
     *собсно обновление кошельков участников раунда
     */
    $cash = $points*$qw;
    
    $query = "UPDATE my_account SET cash = (cash + $cash) WHERE user_id = $user_id";
    
    $result = mysql_query($query) or die ($query);
    
    $num_aff = mysql_affected_rows();
    
    return $num_aff;
}
?>
