<?php

/*
 * created by arcady.1254@gmail.com 27/4/2012
 */

$month_array = array('','январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь');

$c_days = intval(date(t));

$n_day = intval(date(j));

$num_month = intval(date(m));

$year = intval(date(Y));

//echo ($c_days+1)." = $num_month => ".$month_array[$num_month];
/*
 *  строим селектор дней месяца от
 */
?>
<div style="position: relative;width: 800px;margin: 0 auto;">
    <br/>
    <br/>
    <form action="index.php?act=stime" method="post">
        <table border="0">
            <tr>
                <td colspan="4">
                    Выберите период.
                </td>
            </tr>
            <tr>
                <td>
    
                    <select name="month_m">
                        <?php
                        $i = 1;
                        while ($i < 13){
                            $dd = $i;
                            if($dd<10)$dd = "0$dd";

                            if($num_month == $i){
                               echo "<option value='$dd' selected>$month_array[$i]</option>";

                            }else{
                                echo "<option value='$dd'>$month_array[$i]</option>";
                            }
                            $i++;
                        }
                        ?>
                    </select>
                    &nbsp;
                    <select name="day_m">
                        <?php
                        $i = 1;
                        while ($i < (32)){

                            if($n_day == $i){
                               echo "<option value='$i' selected>$i</option>";

                            }else{
                                echo "<option value='$i'>$i</option>";
                            }
                            $i++;
                        }
                        ?>
                    </select>
                    &nbsp;
                    <select name="year_m">
                        
                        <?php 
                        $i = ($year - 3);
                        
                        while ($i < ($year+1)){
                            if($i == $year){
                                echo "<option value='$i' selected>$i</option>";
                            }  else {
                                echo "<option value='$i'>$i</option>";
                            }
                          $i++;  
                        }
                        ?>
                        
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
        
                        <select name="month_M">
                    <?php
                    $i = 1;
                    while ($i < 13){
                            $dd = $i;
                            if($dd<10)$dd = "0$dd";

                            if($num_month == $i){
                               echo "<option value='$dd' selected>$month_array[$i]</option>";

                            }else{
                                echo "<option value='$dd'>$month_array[$i]</option>";
                            }
                           
                        $i++;
                    }
                    ?>
                </select>
                    &nbsp;
                <select name="day_M">
                    <?php
                    $i = 1;
                    while ($i < (32)){

                        if($n_day == $i){
                           echo "<option value='$i' selected>$i</option>";

                        }else{
                            echo "<option value='$i'>$i</option>";
                        }
                        $i++;
                    }
                    ?>
                     </select>
                    &nbsp;
                    <select name="year_M">
                        
                        <?php 
                        $i = ($year - 3);
                        
                        while ($i < ($year+1)){
                            if($i == $year){
                                echo "<option value='$i' selected>$i</option>";
                            }  else {
                                echo "<option value='$i'>$i</option>";
                            }
                          $i++;  
                        }
                        ?>
                        
                    </select>
                </td>
                <td>
                    &nbsp;&nbsp;  

                </td>
                <td>

                    <input type="submit" value="Выбрать"/>
                </td>
            </tr>
        </table>


        

    </form>
</div>