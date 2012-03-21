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
            <input type="submit" value="Войти" class='submit3' style='color:green'/>
          </form>  
     </span>      
   
<?php } else { 
    // To Do Если имя и фамилия очень длинные, то выводить только фамилию
    ?>
    
<span class="selector3">
    
<form id="ofice" action='index.php?act=logout' method='post'>
    <?php if($user->data[name]){
        echo $user->data[name]." ". $user->data[surname];
    }else{
        echo $attributes[email];
        echo "<input type='hidden' name='id' value='$attributes[id]'/><input type='hidden' name='email' value='$attributes[email]'/>";
    }
?>
    <input type='button' class='submit3' value='Кабинет' style='color:green;' onclick="javascript:_goAbout('ofice');" />
    <input type='submit' class='submit3' value='X' style='color:red'/>
</form>
</span>

<?php }


?>
</div>
<script language="javascript">
    function _goAbout(ID){
        
        var uid = document.getElementById(ID).id.value;
        
        var email = document.getElementById(ID).email.value;
        
        document.write("<form action='index.php?act=regu' method='post'><input type='hidden' name='id' value='"+uid+"'/><input type='hidden' name='email' value='"+email+"'/></form>");
        document.forms[0].submit();
    }
</script>