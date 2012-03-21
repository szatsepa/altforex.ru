<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */

//print_r($user);

$us = 0;

if(isset($user)){
    $us = 1;
    
//    $eps = $user->data[eps];

//    $eps_array = str_split($eps);

}
if(isset($attributes[eps]) && isset ($attributes[key])){
    $email = $attributes[email];
 ?>   
<script language="javascript">
//        alert("Кодовое слово было отправлено по адресу - <?php echo $email;?>");
</script>
   <?php 
}
?>
<br/>
<div class="envelope_base">
    <div class="registration">
     <form id="reg_form_<?php echo $us;?>">   
        <div class="regs_fields">
            <input type="hidden" name="user_id" value="<?php echo $user->data[id];?>"/>
<!--            <input type="hidden" name="email_id" value="<?php echo $user->data[email_id];?>"/> -->
            <input type="hidden" name="eps" value="<?php echo $eps;?>"/>
            <div class="r_surname">
                <input size="42" type="text" required name="surname" value="<?php echo $user->data[surname];?>"/> 
            </div>
            <div class="r_surname">
                <input size="42" type="text" required name="name" value="<?php echo $user->data[name];?>"/>
            </div>
            <div class="r_surname">
<!--                <input size="42" type="text" name="patronymic" value="<?php echo $user->data[patronymic];?>"/>-->
            </div>
            <div class="r_surname">
<!--                <input size="42" type="text" name="residens" value="<?php echo $user->data[address];?>"/>-->
            </div>
            <div class="r_surname">
                <input size="42" type="text" required name="email" value="<?php echo $user->data[email];?>"/>
            </div>
            <div class="r_surname">
                <input size="42" type="text" required name="phone" value="<?php echo $user->data[phone];?>"/>
            </div>
            <div class="r_surname">
                <input size="42" type="text" name="word" value="<?php echo $user->data[key_word];?>"/>
            </div>
            <div class="r_surname">
<!--                <input size="42" type="text" required name="bank_card" value="<?php echo $user->data[bank_card];?>"/>-->
            </div>
            <div class="r_surname">
<!--               <input type="button" value="Изменить код" onclick="javascript:_changeCode('reg_form_<?php echo $us;?>');"/>  -->
            </div>
        </div>
        <div class="reg_submit"> 
            <input type="button" value="Сохранить" onclick="javascript:_writeUser('reg_form_<?php echo $us;?>');"/>
        </div>
<!--         <div class="change_code"> 
          
        </div>-->
         </form> 

        <div class="stamp">
            <p>На вашем счету</p>
            <p style="font-size: 22px;font-weight: bold;"><?php echo $user->data[cash];?></p>
            <p>баллов</p>
<!--            <input type="image" src="http://e-ps.me/images/stamp.gif" width="145" height="145" alt="BUTTON" title="Вернутся на главную" onclick="javascript:document.location.href='index.php?act=main';"/>-->
        </div>
<!--            <div class="reg_index">-->
            
            <?php 
//            for($i=0;$i<8;$i++){
//                $ml = ($i*45)."px";
//                 
//                 if($eps){
//                     echo "<div class='r_index_0' style='margin-left: ".$ml.";'><img src='http://".$host."/images/symbols/".  strtolower($eps_array[$i]).".png'/>";
//                 }else{
//                     echo "<div class='r_index_0' style='margin-left: ".$ml.";'><img src='http://".$host."/images/symbols/index_plase.jpg'/>";
//                 }
//                echo "</div>";
//          }
          ?>
<!--        </div>-->
        
    </div>
</div>
