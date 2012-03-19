<?php

/*
 * created by arcady.1254@gmail.com 7/3/2012
 */

class User{
    
    var $data;
    
    function User(){
        $this->data = array();
    }
    
    function setUser($id){  
        
        $query = "SELECT u.id, u.surname, u.name, u.patronymic, u.key_word, u.phone, u.address, u.bank_card, s.id AS email_id, s.email, s.eps_cod AS eps FROM eps_users AS u, eps_sender AS s WHERE u.email_id = s.id AND u.id = $id";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->data = $row; 
        
        unset($row);
        
        mysql_free_result($result);
    }
    function setUserKey($array){
        
        $this->data = $array;
        
    }
 
}
?>
