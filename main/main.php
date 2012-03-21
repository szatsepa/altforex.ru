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
    
function _goRmail(aga, whot){
   
    var whot_array = new Array('квадрат','круг','треугольник');
    
    if(aga == 0){
        document.location='http://altforex.ru/index.php?act=rmail';
    }else{
        if(confirm("\t\tВы желаете отдать голос за "+whot_array[whot]+"?\n С вашего счета будет списано 5 (или скоканада) балов")){
           document.location='http://altforex.ru/index.php?act=vote&whot='+whot; 
        }else{
           document.location='http://altforex.ru/index.php?act=main'; 
        }
    }
    
}    
    
</script>