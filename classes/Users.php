<?php

/*
 * created by arcady.1254@gmail.com 11/4/2012
 */

/**
 * Description of Users
 *
 * @author seroga
 */
class Users {
    
    var $data;
        
    function Users(){
                
        $this->data = array();
        
        $query = "SELECT u.id, u.name, u.surname, u.email, a.cash, e.id AS level, e.name AS element 
            FROM `users` u, `my_account` a, `elements` e 
            WHERE u.id = a.user_id AND a.level = e.id
            AND u.status <> 1
            AND u.activ = 1";

        $result = mysql_query($query) or die($query);
        
        while ($row = mysql_fetch_assoc($result)){
            
                $player = new Player($row);
                
                array_push($this->data, $player);
        }
    }
}

?>
