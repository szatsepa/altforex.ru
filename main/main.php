<?php

/*
 * created by arcady.1254@gmail.com
 */
if($_SESSION[auth] == 1){
    
    $square = $vote_array[square];
    
    $circle = $vote_array[circle];
    
    $triangle = $vote_array[triangle];
    
    $cash = $user->data[cash];
    
    if($cash == 0){
        echo "<script language='javascript'>alert('Вам необходимо пополнить счет!');</script>";
    }
}else{
    $cash = 0;
}
?>
<div class="glagne">
    <div class="title_main">
        <div id="time" style="font-size: 14px;">	
            <?php
            if($_SESSION[auth] == 1){?> 
            1:30
            <?php }else{
                $senya = date("d M g:i");
                 echo "$senya";
            } ?>
        </div>
        <p>Голосование.</p>
    </div>
    <div class="square"> 
        <input type="image" src="http://<?php echo $host;?>/images/square.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',0,<?php echo $cash;?>);"/>
        <div class="rate" title="Показать статистику." onclick="javascript:_gameStatistics('stat');">
            <p class="rate"><?php echo $square;?></p>
        </div>
    </div>
    <div class="circle">
         <input type="image" src="http://<?php echo $host;?>/images/circle.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',1,<?php echo $cash;?>);"/>
         <div class="rate" title="Показать статистику." onclick="javascript:_gameStatistics('stat');">
            <p class="rate"><?php echo $circle;?></p>
        </div>
    </div>
    <div class="triangle">
         <input type="image" src="http://<?php echo $host;?>/images/triangle.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',2,<?php echo $cash;?>);"/>
         <div class="rate" title="Показать статистику." onclick="javascript:_gameStatistics('stat');">
            <p class="rate"><?php echo $triangle;?></p>
        </div>
    </div>
</div>
<?php if(isset ($_SESSION[auth]) && $_SESSION[auth] == 1){ ?>
<script language="javascript">
   
    var min = 1;
    var sec = 30;
    var timerid;
    timerid = setInterval(timer,1000); /* запускаем таймер */
   
</script>
<?php } ?>