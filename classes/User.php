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
        
        $query = "SELECT u.id, u.surname, u.name, u.email, u.phone, u.key_code, a.cash, a.bonus FROM users AS u   LEFT JOIN my_account AS a ON u.id = a.user_id WHERE u.id = $id";
        
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
