<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */
if(isset ($attributes[activate])){
    if($user->reactivTasks()){
        header("location:index.php?act=setvote");
    }
}
$coll_array = array('Раунд','Квадрат','Круг','Треугольник','Активировать');
$level_array = array('1'=>'Воздух','2'=>'Сталь','3'=>'Медь','4'=>'Серебро','5'=>'Золото','6'=>'Платина','7'=>'Бриллиант')
     
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
            if($n==0)echo "<td colspan='3'>$value</td>";
            if($n!=0)echo "<td>$value</td>";
            $n++;
        }
        ?>
                </tr>
            </thead>
            <tbody style="font-size: 12px;font-weight: normal;">
                <?php
                $n = 0;
    foreach ($user->tasks->data as $value) {
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
                        <input name='round' value='<?php echo ($n+1);?>' size='2'  title="Ну ето как то неопределенная величина нигде не записоваеццо а просто типа по порядку."/> 
                    </td>
                    <td>
                        <input name='count' value='<?php echo $value[count];?>' size='3' title="Количество голосов за фигуру в один присест(сиречь ход)."/> 
                    </td>
                    <td>
                        <select name="level" title="Выбрать уровень из доступных.">
                            <?php
                                    for ($i = 1;$i<=($user->data[level]);$i++){
                            
                                             if($i == ($user->tasks->data[$n][level])){
                                                     echo "<option value='$i' selected >$level_array[$i]</option>";
                                                }else{
                                                      echo "<option value='$i'>$level_array[$i]</option>";
                                                }
                                   }
                            ?>
                           
                        </select>
                        
                    </td>
                    <td>
                        <input type='radio' name='figure' value='1' <?php echo $sq;?>/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='2' <?php echo $cr;?>/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='3' <?php echo $tr;?>/>
                    </td>
                    <td>
                        <input type='checkbox' name='activ' <?php echo $check;?>/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Записать" onclick='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();' />
                        <input style="color:red;" type="button" value="X" onclick='javascript:_deleteTask("set_vote_<?php echo $n;?>");' />
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
                        <input name='round' value='<?php echo ($n+1);?>' size='2'/>
                    </td>
                    <td>
                        <input name='count' size='3'/>
                    </td>
                                        <td>
                        <select name="level">
                            <?php
                                   for ($i = 1;$i<=($user->data[level]);$i++){
                            
                                         echo "<option value='$i'>$level_array[$i]</option>";
                                                
                                   }
                            ?>
                           
                        </select>
                        
                    </td>
                    <td>
                        <input type='radio' name='figure' value='1'/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='2'/>
                    </td>
                    <td>
                        <input type='radio' name='figure' value='3'/>
                    </td>
                    <td>
                        <input type='checkbox' name='activ' <?php echo $check;?>/>
                        <input type="button" value=">" onclick='javascript:document.forms["set_vote_<?php echo $n;?>"].submit();' />
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
                        <input type="button" value="Вернутся к игре" onclick="javascript:document.location.href='http://altforex.ru/index.php?act=main';"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Добавить строку" onclick="javascript:document.location.href='http://altforex.ru/index.php?act=addrow';" <?php echo $add_row;?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Активировать все" onclick="javascript:document.location.href='http://altforex.ru/index.php?act=setvote&activate=1';"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
