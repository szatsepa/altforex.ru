<?php

/*
 * created by arcady.1254@gmail.com 28/3/2012
 */

$head = "$user[name] $user[surname]";

if(!$user[name])$head = $user[email];
?>
<div class="user_red">
    <h3 style="text-align: center;"><?php echo $head;?></h3> 
    <form id="user">
        <input type="hidden" name="uid" value="<?php echo $user[id];?>"/>
        <strong>Баланс <?php echo $user[cash];?> добавить-</strong>
        <input size="9" type="text" name="cash" value=""/>
        <br/><br/>
        <strong>Статус&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&nbsp;
        <select name="element">
            <?php
            foreach ($elements_array as $value) {
                if($user[status] == $value[name]){
                    echo "<option value='$value[id]' selected>$value[name]</option>";
                }else{
                    echo "<option value='$value[id]'>$value[name]</option>";
                }
                
            }
            ?>
        </select>
        <br/><br/>
        <input type="button" value="Изменить" onclick="javascript:_regUser('user');"/>
    </form>
</div>