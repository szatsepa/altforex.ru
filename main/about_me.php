<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */
$us = 0;

if(isset($user)){
    $us = 1;
    $checked = '';
    if($user->data[task] >= 1){
        $checked = "checked";
    }
}
if(isset($attributes[eps]) && isset ($attributes[key])){
    $email = $attributes[email];
}
?>
<br/>
<div class="envelope_base">
    <div class="registration">
     <form id="reg_form_<?php echo $us;?>">   
        <div class="regs_fields">
            <input type="hidden" name="user_id" value="<?php echo $user->data[id];?>"/>
            <input type="hidden" name="eps" value="<?php echo $eps;?>"/>
            <div class="r_surname">
                <div class="t_surname">Фамилия</div>
                <div class="input_surname">
                    <input size="36" type="text" required name="surname" value="<?php echo $user->data[surname];?>"/> 
            </div>
                </div>
            <div class="r_surname">
                <div class="t_surname">Имя</div>
                <div class="input_surname">
                    <input size="36" type="text" required name="name" value="<?php echo $user->data[name];?>"/>
            </div>
                </div>
            <div class="r_surname">
               <div class="t_surname">Емейл</div> 
               <div class="input_surname">
                   <input size="36" type="text" required name="email" value="<?php echo $user->data[email];?>"/>
                </div>
                </div>
            <div class="r_surname">
                <div class="t_surname">Телефон</div>
                <div class="input_surname">
                    <input size="36" type="text" required name="phone" value="<?php echo $user->data[phone];?>"/>
                </div>
                </div>
            <div class="r_surname">
                <div class="t_surname">Код</div>
                <div class="input_surname">
                    <input size="36" type="text" name="word" value="<?php echo $user->data[key_code];?>"/>
                </div>
                </div>
        </div>
        <div class="reg_submit"> 
            <input type="button" value="Сохранить" onclick="javascript:_writeUser('reg_form_<?php echo $us;?>');"/>
        </div>
     </form> 
        <div class="auto_vote">
            <form id="auto_vote">
                <div class="auto_chbox">
                   Включить автоматическое голосование - 
                   <input type="checkbox" name="auto" onchange="javascript:_onauto('auto_vote');" <?php echo $checked;?>/>
                   &nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="button" value="Настройки голосования" onclick="javascript:document.location.href = 'http://altforex.ru/index.php?act=setvote';"/>
                </div>
            </form>
         </div>
        <div class="stamp" title="Вернутся на главную" onclick="javascript:document.location.href='index.php?act=main';">
            <p>У Вас есть</p>
            <p style="font-size: 22px;font-weight: bold;"><?php echo $user->data[cash];?></p>
            <p>голосов</p>

        </div>
    </div>
</div>
