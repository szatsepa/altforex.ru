<?php

/*
 * created by arcady.1254@gmail.com
 */
if($_SESSION[auth] == 1){
    
    $square = $vote_array[square];
    
    $circle = $vote_array[circle];
    
    $triangle = $vote_array[triangle];
}
?>
<div class="glagne">
    <div class="title_main">
        <div id="time">	
            1:30
        </div>
        <p>Голосование.</p>
    </div>
    <div class="square"> 
        <input type="image" src="http://<?php echo $host;?>/images/square.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',0);"/>
        <div class="rate">
            <p class="rate"><?php echo $square;?></p>
        </div>
    </div>
    <div class="circle">
         <input type="image" src="http://<?php echo $host;?>/images/circle.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',1);"/>
         <div class="rate">
            <p class="rate"><?php echo $circle;?></p>
        </div>
    </div>
    <div class="triangle">
         <input type="image" src="http://<?php echo $host;?>/images/triangle.gif" alt="Button" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>',2);"/>
         <div class="rate">
            <p class="rate"><?php echo $triangle;?></p>
        </div>
    </div>
</div>
<script language="javascript">
   
    var min = 1;
    var sec = 30;
    var timerid;
    timerid = setInterval(timer,1000); /* запускаем таймер */
   
</script>