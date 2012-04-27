<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012.
 */
//print_r($statistics);
?>
<div class="stat_head">
<p class="stat_head">Раунд <?php echo $statistics[0][round];?></p>

<p class="stat_head_1">Начат - <?php echo $statistics[0][date_event];?></p>
</div>
<div class="stat_table">
             <table width="587" border="1">
                 <thead class="stat_table">
                     <tr>
                         <td colspan="2">
                            Участник 
                         </td>
                         <td>
                             Фигура 
                         </td>
                         <td>
                             Голосов
                         </td>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     $sq = 0;
                     $cr = 0;
                     $tr = 0;
                     
                     foreach ($statistics as $value) {
                         if($value[figures] == 'square')$sq += $value[point];
                         if($value[figures] == 'circle')$cr += $value[point];
                         if($value[figures] == 'triangle')$tr += $value[point];
                         
                     ?>
                     <tr>
                         <td colspan="2">
                             <?php echo $value[email];?>
                         </td>
                         <td >
                             <?php  echo $value[figures];?>
                         </td>
                         <td align="center">
                             <?php  echo $value[point]; $all += $value[point];?> 
                         </td>
                     </tr>
                     <?php
                     }
                     ?>
                     <tr class="stat_table">
                         <td>
                             ИТОГО: <?php  echo $all; ?>&nbsp;
                         </td>
                         <td>
                             квадрат: <?php  echo $sq; ?>
                         </td>
                         <td>
                             круг: <?php  echo $cr; ?>
                         </td>
                         <td>
                             треугольник:<?php  echo $tr; ?>&nbsp; 
                         </td>
                     </tr>
                 </tbody>
             </table>
             
  </div>  
