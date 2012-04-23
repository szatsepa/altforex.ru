<?php

/*
 * created by arcady.1254@gmail.com 3/4/2012
 */

/**
 * Description of Game
 *
 * @author seroga
 */
class Game{
    var $id;
    var $level;
    var $date_event;
    var $update;
    var $square;
    var $circle;
    var $triangle;
    var $user;
    var $email;
    var $error;
    var $level_name;
    var $factor;
    
    
    function Game($user, $email){
        $this->user = $user;
        $this->email = $email;
    }
    function setGame($id){
        
        $query = "SELECT e.date_event,
        e.date_change AS 'update', 
        e.square, 
        e.circle, 
        e.triangle, 
        e.level, 
        l.name AS level_name ,
        l.weight AS factor 
        FROM election AS e, 
        elements AS l 
        WHERE e.stop_round <> 1 
        AND e.level = l.id 
        AND e.id = $id";
        
        $this->id = $id;
        
        $result = mysql_query($query);
        
        if(!$result){
            return NULL;
        }  else {
            
            $tmp = mysql_fetch_assoc($result);
        
            $this->level = $tmp[level];

            $this->date_event = $tmp[date_event];

            $this->update = $tmp[date_change];

            $this->square = $tmp[square];

            $this->circle = $tmp[circle];

            $this->triangle = $tmp[triangle];

            $this->level_name = $tmp[level_name];
            
            $this->factor = $tmp[factor];
            
            return 1;
        }
    }
    
    function move($figure, $vote){
        /*
         *  ход в ручную
         */

        $close_75 = NULL;
        
        $status_vote = NULL;
        
        $return = NULL;
        
        $check = $this->_checkCash($vote);
        
        if($check == 0){
            $this->error = "c";
            $status_vote = 1;
        }else{
        
            $fig_name = $this->_figuresName($figure);
        
            if((($this->$fig_name)+$vote) >= 100 && $check){
                $aga = $this->_getVote($figure);
                 if($aga > 0){
                     $status_vote = 1;
                     $this->error = "v";
                }else{
                    
                    $delivery = $vote - (100 - ($this->$fig_name));
                    $vote = (100 - ($this->$fig_name));
                    $ahtung = 1;
                }
            }
        
        }
        
       if(!$status_vote){
            
            
            $name = $this->_figuresName($figure);
/*
 *  создаем соотв запись в таблице
 */

            mysql_query("INSERT INTO rate (user_id, election_id, figure_id, point) VALUES ($this->user, $this->id, $figure, $vote)");

/*
 * минусуем количество голосов в кошельке участника игры
 */ 
            $query = "UPDATE my_account SET cash = (cash - $vote) WHERE user_id = $this->user";

            $result = mysql_query($query) or die ($query); 
            
            $num_aff = mysql_affected_rows();
            
            if($num_aff != 0){
            
            $query = "INSERT INTO trunk (user_id, added,game,figure) VALUES ($this->user, -($vote*($this->factor)), $this->id, $figure)";
            
            $result = mysql_query($query) or die($query);
            
            $num_aff = mysql_insert_id();
        }
/*
 * изменяем запись в таблице теккущего голосования и перезагружаем страницу
 */
            if($num_aff){
    
                $query = "UPDATE `election` SET `$name` = (`$name` + $vote), `date_change` = now() WHERE id = $this->id";
    
                $result = mysql_query($query) or die ($query);
                
                $afr = mysql_affected_rows();
                
                if($afr != 0){
                    
                                    
                    $query = "SELECT square, circle, triangle FROM election WHERE id = $this->id";
                
                    $result = mysql_query($query) or die($query);
                
                    $row = mysql_fetch_assoc($result);
                
                    $check_75 = $this->_check75($row);
                
                    if($check_75 == 2){
                        $close_75 = $this->_close(2);  
                    }
                
                    if($row[$name] >= 100 && !$close_75){
                        $this->_roundClose($row);
                    }
                
                    if($afr > 0 && !$return){
                         $return = 1;
                        }
                    
                    }

              }
  
        } 
        
        return $return;
        
    }
    
    function _checkCash($vote){
            
         $query = "SELECT Count(id) FROM my_account WHERE user_id = $this->user AND cash >= $vote";
    
         $result = mysql_query($query) or die ($query);
    
         $row = mysql_fetch_row($result);
    
         $count = $row[0];
    
        return $count;
    }
        
    function _check75($data){

        /*
         * если в раунде голосуют только за две фигуры (одна из фигур остается нулевой)
         * а одна из двух набирают более чем 75 голосов 
         * раунд прекращается 
         */
        $out = NULL;
        $ch75 = NULL;
        $ch0 = NULL;
        $chno0 = NULL;

        foreach ($data as $value) {
            if($value >= 75){$ch75+=1;}
            if($value == 0){$ch0 +=1;}
            if($value > 0){$chno0 +=1;}
        }
        
       if($ch0 == 1){
           if($ch75 == 1 && $chno0 == 2){
               $out = 2;
           }
       }
 
        return $out;
        
    }
    
        
    function _close($status){
        
        $query = "UPDATE election SET stop_round = 1 WHERE id = $this->id";
        
        $result = mysql_query($query) or die($query);
        
        $num_aff = mysql_affected_rows();
        
        $out =$this->_game_results($status);
        
        unset ($_SESSION[gid]);
        
        return $out;
    }
    
    function _roundClose($data){
        
        $null = NULL;
        
        $status = NULL;
                
        /*
         * три фигуры и одна дошла до финиша
         * 
         */
        foreach ($data as $value) {
            if($value > 0)$status += 1;
        }
        if($status != 3){
            foreach ($data as $value) {
                if($value == 0)$null+=1;
                
            }
        }
        if($status != 3 && $null == 1){
            $status = 1;
        }
        
        $closed = $this->_close ($status);
        
        return $closed;
 
    /*
     *
     * обе фигуры попалают в статус при своих(with its)
     *
     * если в раунде голосовали только за одну фигуру
     *  она остается в статусе при своих(with its)
     */        
    }


    function _figuresName($figure){
        
        $f_name = mysql_query("SELECT name FROM figures WHERE id = $figure");

        $row = mysql_fetch_assoc($f_name);

        $name = $row[name];

        return $name;

    }
    
    function _getVote($figure){
        
        $query = "SELECT Count(id) FROM `rate` WHERE user_id = $this->user AND election_id = $this->id AND figure_id = $figure";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_row($result);
        
        return $row[0];
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
    * 
    */
        $message = '';
        
        $out = NULL;
        
        $query = "SELECT user_id FROM `rate` WHERE election_id = $this->id GROUP BY user_id";
    
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
                ON r.election_id  = $this->id
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
            for($i = 0;$i < count($user_rate);$i++){
                foreach ($user_rate[$i] as $key => $value) { 
                
                    if($value[figures] == $standoff[0]){

                       $out +=   $this-> _back_points($value[user_id], $value[point], 1);
                     }
                    if($value[figures] == $prize[0]){

                       $out +=   $this->_back_points($value[user_id], $value[point], 2);
                    }
                }
            }
         }  else {
      
            for($i = 0;$i < count($user_rate);$i++){
                foreach ($user_rate[$i] as $key => $value) { 

                       $out +=  $this->_back_points($value[user_id], $value[point], 1);
                 
                 }
            }
        }
        
        $this->_resultMessage();

        return $out;

    }
    function _back_points($user_id, $points, $qw){
    /*
     *собсно обновление кошельков участников раунда
     */
        $cash = $points*$qw;
    
        $query = "UPDATE my_account SET cash = (cash + $cash) WHERE user_id = $user_id";
    
        $result = mysql_query($query) or die ($query);
    
        $num_aff = mysql_affected_rows();
        
        if($num_aff!=0){
            
            $query = "INSERT INTO trunk (user_id, added, game, figure) VALUES ($user_id, ($cash*($this->factor)), $this->id, 'R')";
            
            $result = mysql_query($query) or die($query);
            
            $num_aff = mysql_insert_id();
        }
    
        return $num_aff;
    }
    function _autoMove($figure, $vote,$task){
    /*
     *       игрок может выбрать режим «автоматической игры»: 
     *  - в этом режиме он назначает цепочку-очередность  фигур
     *  за которые он голосует система в каждом раунде голосует вместо него,
     *  в результате вероятных выигрышей  при поступлении в кошелек необходимой суммы
     *  голосования продолжаются за заранее выбранные фигуры но на более дорогом поле.
     */
        $close_75 = NULL;
        
        $status_vote = NULL;
        
        $return = NULL;
        
        $check = $this->_checkCash($vote);
        
        if($check == 0){
            $status_vote = 1;
        }else{
        
            $fig_name = $this->_figuresName($figure);
        
            if((($this->$fig_name)+$vote) > 100 && $check){
                $aga = $this->_getVote($figure);
                if($aga > 0){
                     $status_vote = 1;
                     $this->error = "v";
                }else{
                    
                    $vote = (100 - ($this->$fig_name));
                }            
            }    
        }
               if(!$status_vote){
            
            $name = $this->_figuresName($figure);
/*
 *  создаем соотв запись в таблице
 */

            mysql_query("INSERT INTO rate (user_id, election_id, figure_id, point) VALUES ($this->user, $this->id, $figure, $vote)");

/*
 * минусуем количество голосов в кошельке участника игры
 */ 
            $query = "UPDATE my_account SET cash = (cash - $vote) WHERE user_id = $this->user";

            $result = mysql_query($query) or die ($query); 
            
            $num_aff = mysql_affected_rows();
            
            if($num_aff != 0){
            
            $query = "INSERT INTO trunk (user_id, added,game,figure) VALUES ($this->user, -($vote*($this->factor)), $this->id, $figure)";
            
            $result = mysql_query($query) or die($query);
            
            $num_aff = mysql_insert_id();
        }
/*
 * изменяем запись в таблице теккущего голосования и перезагружаем страницу
 */
            if($num_aff > 0){
    
                $query = "UPDATE `election` SET `$name` = (`$name` + $vote), `date_change` = now() WHERE id = $this->id";
    
                $result = mysql_query($query) or die ($query);
                
                $afr = mysql_affected_rows();
                
                if($afr != 0){
                    
                    $query = "SELECT square, circle, triangle FROM election WHERE id = $this->id";
                
                    $result = mysql_query($query) or die($query);
                
                    $row = mysql_fetch_assoc($result);
                
                    $check_75 = $this->_check75($row);
                
                    if($check_75 == 2){
                        $close_75 = $this->_close(2);  
                    }
                
                    if($row[$name] >= 100 && !$close_75){
                        $this->_roundClose($row);
                    }
                
                    if($afr > 0 && !$return){  
                         $return = 1;
                        }
                    
                    }

              }
  
        }
        
    mysql_query("UPDATE user_task SET auto = 0 WHERE id = $task");
        
    return $return;  
    }
    function _resultMessage(){
        
        $query = "SELECT e.id, u.name, u.surname, f.name AS figure, r.point, r.time 
            FROM rate AS r, election AS e, users AS u, figures AS f 
            WHERE e.id=$this->user 
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
        
        $message ="Здравствуйте!\n";
        
        $n = 1;
        
        foreach ($steps_array as $value){
            
           $message .= "| $n | $value[name] $value[surname] | $value[figure] | $value[point] | $value[time] |\n"; 
           
           $n++;
        }
        
        $message .= "C уважением. Администрация. ";              

        $headers = 'From: administrator@altforex.ru\r\n';

        $headers  .= 'MIME-Version: 1.0' . "\r\n";

        $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

        mail($this->email, 'Результаты раунда', $message, $headers);
        
     }
}

?>
