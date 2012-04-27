<?php

/*
 * created by arcady.1254@gmail.com 26/4/2012
 */

?>
<div style="position: relative; width: 360px; left: 120px;"> 
<?php
 
foreach ($election as $value) {
    if($value[square] !=0 && $value[circle] != 0 && $value[triangle] !=0){
    ?>
    <span style="text-align: center;"> 
        <p>
            <a href="http://altforex.ru/admin/index.php?act=round&rid=<?php echo $value[id];?>">Раунд №-<?php echo $value[id];?> закончен - <?php echo $value[date_change];?></a>
        </p>
    </span>
<?php
    }
}
?>
</div>