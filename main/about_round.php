<?php

/*
 * created by arcady.1254@gmail.com 21/4/2012
 */
$figures = array('square'=>'Квадрат','circle'=>'Круг','triangle'=>'Треугольник');
?>
<div class="pro_round">
    <table width="100%" border="1">
        <thead>
            <tr style="text-align: center;font-size: 14px;font-weight: bold;">
                <td>
                   Номер 
                </td>
                <td>
                   Участник 
                </td>
                <td>
                   Фигура 
                </td>
                <td>
                   Голосов 
                </td>
                <td>
                   Время 
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($steps_array as $value) {
                if(!$value[name]){
                    $us = "Аноним";
                    }else{
                        $us = $value[name]." ".$value[surname];
                    }
                ?>
            <tr>
               <td align="center">
                   <?php echo $value[id];?> 
                </td>
                <td>
                   <?php echo $us;?> 
                </td>
                <td>
                   <?php echo $figures[$value[figure]];?> 
                </td>
                <td align="center">
                   <?php echo $value[point];?>  
                </td>
                <td>
                   <?php echo $value[time];?>  
                </td> 
            </tr>
<?php
            }
            ?>
        </tbody>
    </table>
    
</div>
