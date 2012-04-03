<?php

/*
 * created by arcady.1254@gmail.com
 */
if($_SESSION[auth] == 1){
    
    $square = $actual_game->square;
    
    $circle = $actual_game->circle;
    
    $triangle = $actual_game->triangle;
    
    $cash = $user->data[cash];
    

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
        <div class="rate" title="Показать статистику.">

            <p class="rate"><a style="color: firebrick;" href="http://<?php echo $host;?>/index.php?act=stat" target="_blank" onclick="popupWin = window.open(this.href, 'statistics', 'location,width=600,height=300,top=0,scrollbars'); return false;"><?php echo $square;?></a></p>
        </div>
    </div>
    <div class="circle">
         <input type="image" src="http://<?php echo $host;?>/images/circle.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',1,<?php echo $cash;?>);"/>
         <div class="rate" title="Показать статистику.">
            <p class="rate"><a style="color: firebrick;" href="http://<?php echo $host;?>/index.php?act=stat" target="_blank" onclick="popupWin = window.open(this.href, 'statistics', 'location,width=600,height=300,top=0,scrollbars'); return false;"><?php echo $circle;?></a></p>
        </div>
    </div>
    <div class="triangle">
         <input type="image" src="http://<?php echo $host;?>/images/triangle.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',2,<?php echo $cash;?>);"/>
         <div class="rate" title="Показать статистику.">
            <p class="rate"><a style="color: firebrick;" href="http://<?php echo $host;?>/index.php?act=stat" target="_blank" onclick="popupWin = window.open(this.href, 'statistics', 'location,width=600,height=300,top=0,scrollbars'); return false;"><?php echo $triangle;?></a></p>
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