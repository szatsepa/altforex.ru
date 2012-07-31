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
                    
             $query = "SELECT u.id,
                         u.surname, 
                         u.name, 
                         u.email, 
                         u.phone
                 FROM users AS u   
                 WHERE u.id = $id AND u.activ = 1";
            
        $result = mysql_query($query) or die ($query);

        $row = mysql_fetch_assoc($result);
                        
        $this->data = $row;
        
        unset($row); 
        
        mysql_free_result($result);
    }
    function _createCode($num_cnt, $str_cnt){
    
        $cod = '';

        $simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

        for($i = 0;$i<$str_cnt;$i++){
            
            $cod .= $simbol_array[rand(0, count($simbol_array))];
            
        }

        for($i = 0;$i<$num_cnt;$i++){
            $cod .= rand(0, 9);
        }

        return $cod;
    }

}
class Customer{
    
    var $data;
    
    function Customer(){
        $this->data = array();
    }
    
    function setCustomer($id){ 
                    
             $query = "SELECT u.id,
                         u.surname, 
                         u.name, 
                         u.email, 
                         u.phone
                 FROM customers AS u   
                 WHERE u.id = $id AND u.activ = 1";
            
        $result = mysql_query($query) or die ($query);

        $row = mysql_fetch_assoc($result);
                        
        $this->data = $row;
        
        unset($row); 
        
        mysql_free_result($result);
    }
    function _createCode($num_cnt, $str_cnt){
    
        $cod = '';

        $simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

        for($i = 0;$i<$str_cnt;$i++){
            
            $cod .= $simbol_array[rand(0, count($simbol_array))];
            
        }

        for($i = 0;$i<$num_cnt;$i++){
            $cod .= rand(0, 9);
        }

        return $cod;
    }

}
?>
