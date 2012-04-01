<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */
//print_r($auto_array);

$coll_array = array('Раунд','Квадрат','Круг','Треугольник','Активировать');
     
?>
<div class="envelope_base">
    <div class="setting_vote">
<!--        <form id="set_vote">-->
        <table border="1" width="800">
            <thead style="font-size: 16px;font-weight: bold;text-align: center;">
                <tr>
        <?php
        $n = 0;
        foreach ($coll_array as $value) {
            if($n==0)echo "<td colspan='2'>$value</td>";
            if($n!=0)echo "<td>$value</td>";
            $n++;
        }
        ?>
                </tr>
            </thead>
            <tbody style="font-size: 12px;font-weight: normal;">
                <?php
                $n = 0;
    foreach ($auto_array as $value) {
        $sc = $cr = $tr = $check = NULL;
        if($value[figure_id] == 1)$sq = 'checked';
        if($value[figure_id] == 2)$cr = 'checked';
        if($value[figure_id] == 3)$tr = 'checked';
        if($value[auto] == 1)$check = 'checked';
        
    if($value[round] != 0){
        ?>
            <form action="index.php?act=chngvote" method="post" id="set_vote_<?php echo $n;?>">
                <tr align='center'>
                    <td>
                        <input type='hidden' name='row' value='<?php echo $value[id];?>'/>
                        <input name='round' value='<?php echo $value[round];?>' size='2' onblur="javascript:document.forms['set_vote_<?php echo $n;?>'].submit();"/>
                    </td>
                    <td>
                        <input name='count' value='<?php echo $value[count];?>' size='3' onblur="javascript:document.forms['set_vote_<?php echo $n;?>'].submit();"/> 
                    </td>
                    <td>
                        <input type='radio' name='figure' value='1' <?php echo $sq;?>  onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();'/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='2' <?php echo $cr;?>  onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();'/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='3' <?php echo $tr;?>  onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();'/>
                    </td>
                    <td>
                        <input type='checkbox' name='activ' onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();' <?php echo $check;?>/>
                    </td>
                </tr>
            </form> 
          
                <?php  
    }else{
        $add_row = 'disabled';
        ?>
            <form action="index.php?act=chngvote" method="post" id="set_vote_<?php echo $n;?>">
                <tr align='center'>
                    <td>
                        <input type='hidden' name='row' value='<?php echo $value[id];?>'/>
                        <input name='round' value='1' size='2' onblur="javascript:document.forms['set_vote_<?php echo $n;?>'].submit();"/>
                    </td>
                    <td>
                        <input name='count' size='3' onblur="javascript:document.forms['set_vote_<?php echo $n;?>'].submit();"/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='1' <?php echo $sq;?>  onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();'/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='2' <?php echo $cr;?>  onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();'/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='3' <?php echo $tr;?>  onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();'/>
                    </td>
                    <td>
                        <input type='checkbox' name='activ' onchange='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();' <?php echo $check;?>/>
                    </td>
                </tr>
            </form>
            <?php
    } 
    $n++;
}  
?>
                <tr align="right">
                    <td colspan="7">
                        <input type="button" value="Добавить строку" onclick="javascript:document.location.href='http://altforex.ru/index.php?act=addrow';" <?php echo $add_row;?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
