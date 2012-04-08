<?php

/*
 * created by arcady.1254@gmail.com 5/4/2012
 */

/**
 * Description of Tasks
 *
 * @author seroga
 */
class Tasks {
    
    var $data;
    var $count;
    
    function Tasks(){
        $this->data = array();
    }
    function setTasks($id){
        
        $n = 0;
        
        $query = "SELECT t.id, 
                 t.round, 
                 t.count, 
                 t.figure_id, 
                 f.name,
                 t.level
            FROM user_task AS t 
            LEFT JOIN figures AS f 
            ON  t.figure_id = f.id
            WHERE t.user_id = $id
            AND t.auto = 1
            ORDER BY t.id";
        
        $result = mysql_query($query) or die ($query);
        
        while ($var = mysql_fetch_assoc($result)){
            $var['num'] = $n;
            array_push($this->data, $var);
            $n++;
        }
        
        $this->count = count($this->data);
    }
    function setVote($data){
        $this->data = $data;
        $this->count = count($data);
    }
    
}

?>
