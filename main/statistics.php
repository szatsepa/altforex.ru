<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012.
 */
?>
<table border="1" width="600">
 <thead style="font-size: 16px;font-weight: bold;text-align: center;">
  <tr>
   <td>
     Раунд  
   </td>
   <td>
      Начат 
   </td>
   <td>
      Участники 
   </td>
  </tr>
 </thead>
 <tbody>
     <tr>
         <td align="center">
            <?php echo $statistics[0][round];?> 
         </td>
         <td align="center">
             <?php echo $statistics[0][date_event];?>
         </td>
         <td>
             <table border="1">
                 <thead>
                     <tr>
                         <td>
                            Участник 
                         </td>
                         <td>
                             Фигура
                         </td>
                         <td>
                             Ставка
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
                         <td>
                             <?php echo $value[email];?>
                         </td>
                         <td>
                             <?php  echo $figures[$value[figures]];?>
                         </td>
                         <td align="center">
                             <?php  echo $value[point]; $all += $value[point];?>
                         </td>
                     </tr>
                     <?php
                     }
                     ?>
                     <tr style="font-size: 12px;font-weight: bold;">
                         <td>
                             ИТОГО:<?php  echo $all; ?>
                         </td>
                         <td>
                             квадрат:<?php  echo $sq; ?>
                         </td>
                         <td>
                             круг:<?php  echo $cr; ?>
                         </td>
                         <td>
                             треугольник:<?php  echo $tr; ?>
                         </td>
                     </tr>
                 </tbody>
             </table>
             
         </td>
     </tr>
 </tbody>
</table>
