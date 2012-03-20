<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

?>
<div class="selector">&nbsp;
<?php 

if (!isset ($_SESSION[id]) && $_SESSION[auth] == 0) { 
    ?>
    <span class="selector3">
    
          <form id="13" action="index.php?act=auth" method="post">
            <input id="psw" type="password" name="code" size="18" value="" style='font-size:8pt;'  />
            <input type="submit" value="Кабинет" class='submit3' style='color:green'/>
          </form>  
     </span>      
   
<?php } else { 
    // To Do Если имя и фамилия очень длинные, то выводить только фамилию
    ?>
    
<span class="selector3">
    
<form action='index.php?act=logout' method='post'>
    <?php echo $user->data[name]." ". $user->data[surname];?>
    <input type='button' class='submit3' value='Кабинет' style='color:green;' onclick="javascript:document.location='http://<?php echo $host;?>/index.php?act=reg';" />
    <input type='submit' class='submit3' value='X' style='color:red'/>
</form>
</span>

<?php }


?>
</div>
