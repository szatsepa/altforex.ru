<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */
print_r($auto_array);
$coll_array = array('Раунд','Квадрат','Круг','Треугольник');
     
?>
<div class="envelope_base">
    <div class="setting_vote">
        <form id="set_vote">
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
        $sq = '';
        if($value[square])$sq = 'checked';
        $cr = '';
        if($value[circle])$cr = 'checked';
        $tr = '';
        if($value[triangle])$tr = 'checked'; 
        $string_id = "$value[square]:$value[circle]:$value[triangle]";
    if($value[round] != 0){
        echo "<input type='hidden' name='id_$n' value='$string_id'/><tr align='center'><td><input name='round_$n' value='$value[round]' size='2'/></td><td><input name='count_$n' value='$value[count]' size='3'/></td><td><input type='checkbox' name='square_$n' $sq/></td><td><input type='checkbox' name='circle_$n' $cr/></td><td><input type='checkbox' name='triangle_$n' $tr/></td></tr>";
    }else{
        $add_row = 'disabled';
        echo "<input type='hidden' name='id_$n' value='$string_id'/><tr align='center'><td><input name='round_$n' value='1' size='2'/></td><td><input name='count_$n' size='3'/></td><td><input type='checkbox' name='square_$n'/></td><td><input type='checkbox' name='circle_$n'/></td><td><input type='checkbox' name='triangle_$n'/></td></tr>";
    }
    $n++;
}  
?>
                <tr align="right">
                    <td colspan="5">
                        <input type="button" value="Добавить строку" onclick="javascript:document.location.href='http://altforex.ru/index.php?act=addrow';" <?php echo $add_row;?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Установить настройки" onclick="javascript:_chngAuto('set_vote','<?php echo $n; ?>');"/> 
                    </td>
                </tr>
            </tbody>
        </table>
            </form>
    </div>
</div>