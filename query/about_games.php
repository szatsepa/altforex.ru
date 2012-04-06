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
        $num_g = $games->id_end;
          
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
}else{
    
    $auto = ($_SESSION[auto])*($user->data[auto_on]);
    
    if(!isset ($_SESSION[num_task]))$_SESSION[num_task] = 0;
    
    if($auto == 1 && isset($_SESSION[num_task])){
        
        $_SESSION[auto_task] = $user->getTask($_SESSION[num_task]);
        
        $_SESSION[auto_task][count_task]=$user->tasks->count;
        
    }else{
        
        unset($_SESSION[auto_task]);
    }
  
    if(isset ($attributes[av]) && $attributes[av] == 1){
       
       $avtomat = $actual_game->_autoVote($_SESSION[auto_task]);
       
       ?>
<!--<script type="text/javascript">
    document.location.href = "<?php echo $avtomat;?>";
</script>-->
<?php
    }
    if(isset ($_SESSION[auto_task])&& !isset ($attributes[av])){
       
       $avtomat = $actual_game->setLevel($_SESSION[auto_task]);
              ?>
<script type="text/javascript">
    document.location.href = "<?php echo $avtomat;?>";
</script>
<?php
    }   
}

?> 
