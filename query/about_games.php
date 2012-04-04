<?php

/*
 * created by arcady.1254@gmail.com 3/4/2012
 */
//print_r($user);
if(isset ($attributes[check])){
    if($attributes[check] == "v"){
        ?>
<script language="javascript">
    alert("Вы не можете закрыть раунд.");
</script>
        <?php
    }
    if($attributes[check] == "c"){
      echo "<script language='javascript'>alert('Вам необходимо пополнить счет!');</script>"; 
    }
}
$games = new Games();

$actual_game = new Game($user->data[id]);

//print_r($attributes);
//
//echo "<br/>";

$games->setGames($user->data[level]);

$num_g = $games->data[($games->count)-1][id]; 

$actual_game->setGame($num_g);

if(isset($attributes[whot])){
    
    $votes = intval($attributes[votes]);
    
   if($actual_game->move((intval($attributes[whot])+1), $votes)){
       header ("location:index.php?act=main");
   }else{
       $er = $actual_game->error;
       header ("location:index.php?act=main&check=$er");
   }
}

//print_r($actual_game); 
?>
