<?php

/*
 * created by arcady.1254@gmail.com 7/4/2012 
 */
$images_array = array(NULL,'o2','fe','cu','ag','au','pt','c');

if(!isset ($_SESSION[num_task])){
    
    $count = $user->tasks->count;
    
    $_SESSION[num_task] = ($count-1);
}


$actual_game = new Game($user->data[id], $user->data[email]);

if(isset ($attributes[gid])){
    
    $num_g = intval($attributes[gid]);
    
    $_SESSION[gid] = $num_g;
    
}else if (isset ($_SESSION[gid])){
    
    $num_g = $_SESSION[gid];
}else{
    
    $num_g = $games->id_end;
    
}

if(!$actual_game->setGame($num_g)){
    header("location:index.php?act=logaut");
}

if(isset ($attributes[auto]) && $attributes[auto] == 1){
    
    $_SESSION[auto] = 1;
}
if(isset ($attributes[auto]) && $attributes[auto] == 0){
    unset ($_SESSION[num_task]);
    unset ($_SESSION[auto]);
}


if(isset ($attributes[whot]) && isset ($attributes[votes]) && !isset ($_SESSION[auto])){
    
    $whot = intval($attributes[whot])+1;
    
    $votes = abs(intval($attributes[votes])); 
    
    $move = move_G($whot, $votes, $actual_game);
}

if(isset ($_SESSION[auto])){
    
    $auto = ($_SESSION[auto])*($user->data[auto_on]);
    
    $whot = $user->tasks->data[$_SESSION[num_task]][figure_id];

    $votes = $user->tasks->data[$_SESSION[num_task]][count];

    $task_id = $user->tasks->data[$_SESSION[num_task]][id];

    if($auto == 0){ 
        
         header ("location:index.php?act=main&auto=0");
    }
    if($auto == 1){ 

        $level = $user->tasks->data[$_SESSION[num_task]];

        $tmp = $games->getActualG($level[level]);

        $_SESSION[gid] = $tmp[id];
        
        if(!$tmp[id]){
            
            header ("location:index.php?act=main&auto=0");
            
        }  else {

            if(!$actual_game->setGame($tmp[id])){
                    header("location:index.php?act=logaut");
                }
        }
        
        if(isset ($attributes[at])){
            $_SESSION[move]=1;
        }
        if(isset ($attributes[move])){
            
            unset ($_SESSION[num_task]);
            
            if(!isset($_SESSION[how_many]))$_SESSION[how_many]=1;
            
            $move = move_A($whot, $votes, $actual_game, $task_id);
             
        }

    }
    
}

$game_status = $user->data[level] - $actual_game->level;

//print_r($actual_game); 

$_SESSION[game_id] = $actual_game->id;

function move_G($whot, $votes, $actual_game){
        
    $move = $actual_game->move($whot, $votes);
    
   if($move){       
      $out = header ("location:index.php?act=main");
   }else{
       $er = $actual_game->error;
       $out = header ("location:index.php?act=main&check=$er");
   }
   return $out;
}
function move_A($whot, $votes, $actual_game, $task_id){
       
    $out = NULL;
    
    $_SESSION[how_many] += 1;
    
    if(!$votes){
        
         $out = header ("location:index.php?act=main&auto=0&round=0");
         
    }  else {
            
        $move = $actual_game->_autoMove($whot, $votes, $task_id);
//
//           if($move){ 
//               
//                $out = header ("location:index.php?act=main&auto=1");
//          
//           }else{
//
//               $out = header ("location:index.php?act=main&auto=0");
//           }
           
           $out = header ("location:index.php?act=main&auto=1");
    }


   return $out;
    
}
?>
