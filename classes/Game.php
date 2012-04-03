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
    var $error;
    
    function Game($user){
        $this->user = $user;
    }
    function setGame($id){
        
        $query = "SELECT * FROM election WHERE id = $id";
        
        $this->id = $id;
        
        $result = mysql_query($query) or die ($query);
        
        $tmp = mysql_fetch_assoc($result);
        
        $this->level = $tmp[level];
        
        $this->date_event = $tmp[date_event];
        
        $this->update = $tmp[date_change];
        
        $this->square = $tmp[square];
        
        $this->circle = $tmp[circle];
        
        $this->triangle = $tmp[triangle];
    }
    
    function move($figure, $vote){
        
        $status_vote = $this->close_game($figure);
        
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
/*
 * изменяем запись в таблице теккущего голосования и перезагружаем страницу
 */
            if(mysql_affected_rows() > 0){
    
                $query = "UPDATE `election` SET `$name` = (`$name` + $vote), `date_change` = now() WHERE id = $this->id";
    
                $result = mysql_query($query) or die ($query);
                
                $query = "SELECT square, circle, triangle FROM election WHERE id = $this->id";
                
                $result = mysql_query($query) or die($query);
                
                $row = mysql_fetch_assoc($result);
                
                $this->_roundClose($row);
                
                return 1;
   
                }
  
        }else{
            
            return NULL;
        }
        
        
    }
    function _roundClose($data){
        

        $with_its = array();
        
        $closed = NULL;
        
        $status = NULL;
        
        $point_75 = NULL;
        
        /*
         * три фигуры и одна дошла до финиша
         * 
         */
        foreach ($data as $key => $value) {
            
            if($value == 10)$closed = 1;
            if($value >= 7)$point_75 = 1;
        }
        
        if($closed){
            foreach ($data as $key => $value) {
                if($value == 0){
                    $status += 1;
                    array_push($with_its, $key);
                    }
            }
            if($status == 2){               
                $closed = 1;
            }  else {
                while (count($with_its)){
                    array_pop($with_its);
                }
            }
        }
        if($point_75){
            $status = NULL;
            foreach ($data as $key => $value) {
                if($value == 0){
                    $status += 1;
                    array_push($with_its, $key);
                }
            }
            if($status == 1){
                
                $closed = 1;
            }
        }
 
    /*
     * если в раунде голосуют только за две фигуры (одна из фигур остается нулевой)
     * а одна из двух набирают более чем 75 голосов 
     * раунд прекращается 
     * обе фигуры попалают в статус при своих(with its)
     *
     * если в раунде голосовали только за одну фигуру
     *  она остается в статусе при своих(with its)
     */
        
    }
    function close_game($figure){
        
        $check = NULL;
        
        $fig_name = $this->_figuresName($figure);
    
    /*
     * Участник может голосовать в рамках одного раунда сколько угодно 
     *   НО - Если участник в этом раунде уже голосовал, он не может голосовать
     *  еще раз, если его голос является закрывающим раунд 
     * (добавленный участником голос или голоса завершат раунд)
     */
       
        $query = "SELECT $fig_name FROM election WHERE id = $this->id";
    
        $result = mysql_query($query) or die($query);
    
        $row = mysql_fetch_row($result);
    
        $points = $row[0];
    
        if($points == 9){
            
            $this->error = "v";
            
            $user_vote = $this->_getVote($figure);

            
           /*
            * проверяем кошелек участника на наличие средств(голосов)
            */
            if($user_vote > 0){

                $check = $this->_checkCash($figure);
                
                if(!$check){
                    $this->error = "c";
                }
            }  else {
                $check = 1;
            }
            
            
            
         } else {
             $check = NULL; 
         }  
        
         return $check;
    }
    function _figuresName($figure){
        
        $f_name = mysql_query("SELECT name FROM figures WHERE id = $figure");

        $row = mysql_fetch_assoc($f_name);

        $name = $row[name];

        return $name;

    }
    function _checkCash($figure){
        
         $figure_name = $this->_figuresName($figure);
            
         $query = "SELECT (9 - $figure_name) AS votes FROM election WHERE id = $this->id"; 
            
         $result = mysql_query($query) or die ($query);
            
         $row = mysql_fetch_row($result);
         
         $count = $row[0];
        
         $query = "SELECT cash FROM my_account WHERE user_id = $this->user";
    
         $result = mysql_query($query) or die ($query);
    
         $row = mysql_fetch_row($result);
    
         $cash = $row[0];
    
        if($cash < $count){
            return NULL;
         }  else {
             
             return 1;
         }   
    }
    
    function _getVote($figure){
        
        $query = "SELECT Count(id) FROM `rate` WHERE user_id = $this->user AND election_id = $this->id AND figure_id = $figure";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_row($result);
        
        return $row[0];
    }
}

?>
