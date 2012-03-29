<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */
//print_r($attributes);

$cell = array('round','count','square','circle','triangle');


$str = "$attributes[auto]";

$rows_array = explode("#", $str);

array_pop($rows_array);

$str_head = "UPDATE user_task SET";
$str_body_1 = '';
$fig = '';
$query = "";
$set = '';
foreach ($rows_array as $value) {
   $fig_array = array(); 
   $tmp_array = explode(";", $value);  
   
   foreach ($tmp_array as $var) {
       
       $para_arr = explode("=", $var);
       
       if($para_arr[0] != 'id'){
           $t_array = array($para_arr[0] => $para_arr[1]);
           
            foreach ($t_array as $key => $value) {
                 $pos = strpos($key, 'ro');
                 if(!($pos === FALSE))$round = "round=".$value.",";
                 $pos = strpos($key, 'co');
                 if(!($pos === FALSE)){
                     $cound = "cound=".$value.",";
                     $str_body_1 = $round.$cound;
      
                 }
             }
      
            foreach ($t_array as  $value) {
                  if($t_array[1] == 'false')array_push($fig_array, NULL);
                  if($t_array[1] == 'true')array_push($fig_array, $t_array[1]);   
            } 
       }
   
       if($para_arr[0] == 'id'){ 
          $id_arr = explode(":", $para_arr[1]);  
       }
       
    }
    print_r($fig_array);
    echo "<br/>";
//    $num = 0;
            foreach ($id_arr as $vote) {
                
//              echo "$str_head $str_body_1 WHERE id=$vote;<br/>";
//              $num++;
          }
}


?>
