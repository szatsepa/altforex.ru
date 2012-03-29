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

foreach ($rows_array as $value) {
    
       print_r($value);
       echo "<br/>";
    
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
                     $cound = "count=".$value.",";
                     $str_body_1 = $round.$cound;    
                 }
             }
      
                  if($para_arr[1] == 'false'){array_push($fig_array, "figure_id=null");}
                                            
                  if($para_arr[1] == 'true'){array_push($fig_array, "figure_id=".$para_arr[0]);}
                                              
            
       }
   
       if($para_arr[0] == 'id'){ 
          $id_arr = explode(":", $para_arr[1]);  
       }
//       print_r($id_arr);
//       echo "<br/>";
    }
    $num = 0;
            foreach ($id_arr as $vote) {
               $str_fig = $fig_array[$num]; 
               $query = $str_head." ".$str_body_1." ".$str_fig." WHERE id=".$vote;
//              $result = mysql_query($query) or die ($query);
        echo "$query<br/>";
              $num++;
          }
}

//header("location:index.php?act=setvote");
?>
