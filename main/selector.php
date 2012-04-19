<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */
//print_r($user);
//echo "Баланс ".$user->result.". ";
?>
<div class="selector">&nbsp; 
    <div id="time" style="display: none;">	
            <?php
            if($_SESSION[auth] == 1){?> 
            1:30
            <?php }else{
                $senya = date("d M g:i");
                 echo "$senya";
            } ?>
        </div> 
<?php 

if (!isset ($_SESSION[id]) && $_SESSION[auth] == 0) { 
    ?>
    <span class="selector3">
    
          <form id="13" action="index.php?act=auth" method="post">
            <input id="psw" type="password" name="code" size="18" value="" style='font-size:8pt;'  />
            <input type="submit" value="Войти" class='submit3' style='color:green'/>
          </form>  
     </span>      
   
<?php } else { 
    // To Do Если имя и фамилия очень длинные, то выводить только фамилию
    ?>
    
<span class="selector3">
    
<form id="ofice" action='index.php?act=logout' method='post'>
    <?php
    if($user->data[name]){
        echo $user->data[name]." ". $user->data[surname]; 
        $email = $user->data[email];
        $id = $user->data[id];
    }else{
        if(isset($user->data[email])){
            echo $user->data[email];
            $email = $user->data[email];
            $id = $user->data[id];
        }else{
            echo $attributes[email];
            $email = $attributes[email];
            $id = $attributes[id];
        }
   }
    echo "<input type='hidden' name='id' value='$id'/><input type='hidden' name='email' value='$email'/>";
?>
    <input type='button' class='submit3' value='Кабинет' style='color:green;' onclick="javascript:_goAbout('ofice');" />
    <input type='submit' class='submit3' value='X' style='color:red'/>
</form>
</span>

<?php }


?>
</div>