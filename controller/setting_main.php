<?php

/*
 * created by arcady.1254@gmail.com 7/4/2012 
 */
//print_r($_SESSION);
//echo "<br/>";
$games = new Games();

$actual_game = new Game($user->data[id]);

$games->setGames($user->data[level]);

//print_r($games->data);
//echo "<br/>";

if(isset ($attributes[gid])){
    
    $num_g = intval($attributes[gid]);
    
    $_SESSION[gid] = $num_g;
    
}else if (isset ($_SESSION[gid])){
    
    $num_g = $_SESSION[gid];
}else{
    
    $num_g = $games->id_end;
    
}

$actual_game->setGame($num_g);

if(isset ($attributes[auto]) && $attributes[auto] == 1){
    
    $_SESSION[auto] = 1;
}
if(isset ($attributes[auto]) && $attributes[auto] == 0){
    
    unset ($_SESSION[auto]);
}


if(isset ($attributes[whot]) && isset ($attributes[votes]) && !isset ($_SESSION[auto])){
    
    $whot = intval($attributes[whot])+1;
    
    $votes = abs(intval($attributes[votes]));
    
    move_G($whot, $votes, $actual_game);
}
if(isset ($attributes[whot]) && isset ($attributes[votes]) && isset ($attributes[at])){
    
    $auto = ($_SESSION[auto])*($user->data[auto_on]);

    if(!isset ($_SESSION[num_task])){
        $_SESSION[num_task] = 0;
    }
    
echo "...$_SESSION[num_task]..........$auto...........<br/>";

    if($auto == 1){
        
       $_SESSION[auto_task] = $user->tasks->data[$_SESSION[num_task]];
        
        print_r($_SESSION[auto_task]); 

//        $_SESSION[auto_task][count_task]=$user->tasks->count;
//
//        $_SESSION[did] = $_SESSION[auto_task][id];
//
//        $actual_game->setGame(intval($_SESSION[did]));
//
//        $whot = intval($attributes[whot])+1;
//    
//        $votes = abs(intval($attributes[votes]));
//    
////        move_G($whot, $votes, $actual_game);

        $_SESSION[num_task]++;

    }
}

//print_r($actual_game);

function move_G($whot, $votes, $actual_game){
        
    
    $move = $actual_game->move($whot, $votes);
    
   if($move){       
       header ("location:index.php?act=main");
   }else{
       $er = $actual_game->error;
       header ("location:index.php?act=main&check=$er");
   }
}
?>
