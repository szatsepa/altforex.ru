<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012.
 */
?>
<!--<table border="1" width="600">
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
                  </td>
     </tr>
 </tbody>
</table>-->
<div style="position: relative;float: left; width: 595px;">
<p style="font-size: 22px;text-align: center;">Раунд <?php echo $statistics[0][round];?></p>

<p style="font-size: 19px;text-align: center;">Начат - <?php echo $statistics[0][date_event];?></p>
</div>
<div style="position:relative;float: left; width: 590px;margin: 0 auto;">
             <table width="587" border="1">
                 <thead style="font-size: 12px;font-weight: bold;text-align: center;outline: 1px solid #a7a7a7;">
                     <tr>
                         <td colspan="2">
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
                         <td colspan="2">
                             <?php echo $value[email];?>
                         </td>
                         <td >
                             <?php  echo $figures[$value[figures]];?>
                         </td>
                         <td align="center">
                             <?php  echo $value[point]; $all += $value[point];?> 
                         </td>
                     </tr>
                     <?php
                     }
                     ?>
                     <tr style="font-size: 12px;font-weight: bold;text-align: center;">
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
