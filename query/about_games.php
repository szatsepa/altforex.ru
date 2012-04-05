<?php

/*
 * created by arcady.1254@gmail.com 3/4/2012
 */
print_r($user);

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

if(isset ($attributes[level])){
    
    $num_g = intval($attributes[level]);
    
    $_SESSION[level] = $num_g;
    
}  else {
    
    if(isset ($_SESSION[level])){
        
        $num_g = intval($_SESSION[level]);
        
    }else{
       
        $num_g = $games->data[($games->count)-1][id]; 
        
    }
    
}


$actual_game->setGame($num_g);

if(isset($attributes[whot])){
    
    $votes = abs(intval($attributes[votes]));    
    
    $move = $actual_game->move((intval($attributes[whot])+1), $votes);
    
   if($move){
       header ("location:index.php?act=main");
   }else{
       $er = $actual_game->error;
       header ("location:index.php?act=main&check=$er");
   }
}
 
?>
