<?php

/*
 * created by arcady.1254@gmail.com 10/4/2012
 */

/**
 * Description of Admin
 *
 * @author seroga
 */
class Admin {
    var $id;
    var $surname;
    var $name;
    var $email;
    var $phone;
    
    function Admin(){
    }
    function setAdmin($id){
        
        $query = "SELECT u.id,
                         u.surname, 
                         u.name, 
                         u.email, 
                         u.phone
                 FROM users AS u
                 WHERE u.id = $id 
                 AND u.activ = 1
                 AND u.status = 1";
        
        $result = mysql_query($query) or die($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->id = $row[id];
        
        $this->surname = $row[surname];
        
        $this->name = $row[name];
        
        $this->email = $row[email];
        
        $this->phone = $row[phone];
    }
}

?>
