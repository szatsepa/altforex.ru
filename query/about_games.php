<?php

/*
 * created by arcady.1254@gmail.com 3/4/2012
 */

if(isset ($attributes[auto]) && $attributes[auto] == 1){
    $_SESSION[auto] = $user->data[auto_on];
}
if(isset ($attributes[auto]) && $attributes[auto] == 0){
    unset ($_SESSION[auto]);
    
}
if(!isset ($_SESSION[auto])){
    unset($_SESSION[auto_task]);
}


if(isset ($attributes[check])){
    if($attributes[check] == "v"){
         echo "<script language='javascript'>alert('Вы не можете закрыть раунд.');</script>"; 
    }
    if($attributes[check] == "c"){
        ?>
<script language='javascript'>
    alert('\tВы не можете голосовать!\n\r Вам необходимо пополнить счет!');
</script> 
<?php
      
    }
}
$games = new Games();

$actual_game = new Game($user->data[id]);

$games->setGames($user->data[level]);

$num_g = $games->id_end;

if(isset ($attributes[level])){
    
    $num_g = intval($attributes[level]);
    
    $_SESSION[level] = $num_g;
    
}

$actual_game->setGame($num_g);

if(isset($attributes[whot])){
     
    $whot = intval($attributes[whot])+1;
    
    $votes = abs(intval($attributes[votes]));
    
    if(!isset($_SESSION[auto])){
        
        move_G($whot, $votes, $actual_game);

    }else{

        $auto = ($_SESSION[auto])*($user->data[auto_on]);

        if(!isset ($_SESSION[num_task]))$_SESSION[num_task] = 0;

        if($auto == 1){ 

//            $_SESSION[auto_task] = $user->getTask($_SESSION[num_task]);
//
//            $_SESSION[auto_task][count_task]=$user->tasks->count;
//            
//            $_SESSION[level] = $_SESSION[auto_task][level];
//
//            $actual_game->setGame(intval($_SESSION[level]));
//
//            move_G($whot, $votes, $actual_game);

        }
    }
}

function move_G($whot, $votes, $actual_game){
        
    
    $move = $actual_game->move($whot, $votes);
    
   if($move){
       header ("location:index.php?act=main");
   }else{
       $er = $actual_game->error;
       header ("location:index.php?act=main&check=$er");
   }
}

print_r($user); 
echo "<br/>";
//print_r($user->tasks); 
?> 
