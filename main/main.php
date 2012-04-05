<?php

/*
 * created by arcady.1254@gmail.com
 */
$status_array = array('Воздух','Сталь','Медь','Серебро','Золото','Платина','Бриллиант');

if($_SESSION[auth] == 1){
    
    $square = $actual_game->square;
    
    $circle = $actual_game->circle;
    
    $triangle = $actual_game->triangle;
    
    $cash = $user->data[cash];
 ?>
<div style="position: relative;float: left;width: 100%;height: 32px;z-index: 6;">
  <?php
  for($i=0;$i<$games->count;$i++){
      $dis='';
      if(($i+1) == $actual_game->level)$dis = 'disabled';
      ?>
    <input style="font-size: 14px;font-weight: bold;color: black;" type="button" value="<?php echo $status_array[$i];?>" onclick="javascript:document.location.href = 'http://altforex.ru/index.php?act=main&level=<?php echo ($i+1);?>';" <?php echo $dis;?>/>
    <?php
  }
  ?>
</div>
<?php

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
        <input type="image" src="http://<?php echo $host;?>/images/square.gif" alt="Button" onclick="javascript:_insertVote('ins', '0');"/>
        <div class="rate" title="Показать статистику.">

            <p class="rate"><a style="color: firebrick;" href="http://<?php echo $host;?>/index.php?act=stat" target="_blank" onclick="popupWin = window.open(this.href, 'statistics', 'location,width=600,height=300,top=0,scrollbars'); return false;"><?php echo $square;?></a></p>
        </div>
    </div>
    <div class="circle">
         <input type="image" src="http://<?php echo $host;?>/images/circle.gif" alt="Button" onclick="javascript:_insertVote('ins', '1');"/>
         <div class="rate" title="Показать статистику.">
            <p class="rate"><a style="color: firebrick;" href="http://<?php echo $host;?>/index.php?act=stat" target="_blank" onclick="popupWin = window.open(this.href, 'statistics', 'location,width=600,height=300,top=0,scrollbars'); return false;"><?php echo $circle;?></a></p>
        </div>
    </div>
    <div class="triangle">
         <input type="image" src="http://<?php echo $host;?>/images/triangle.gif" alt="Button" onclick="javascript:_insertVote('ins', '2');"/>
         <div class="rate" title="Показать статистику.">
            <p class="rate"><a style="color: firebrick;" href="http://<?php echo $host;?>/index.php?act=stat" target="_blank" onclick="popupWin = window.open(this.href, 'statistics', 'location,width=600,height=300,top=0,scrollbars'); return false;"><?php echo $triangle;?></a></p>
        </div>
    </div>
</div>
<div class="insert" id="ins">
    <form id="votes">
        <p>Укажите количество голосов.</p>
        <input id="fig" type="hidden" name="figure_id" value=""/>
        <input id="vt" size="2" name="votes" value="1"/>
        <input type="button" value="Голосовать" onclick="javascript:_goRmail('<?php echo $_SESSION[auth];?>','votes',<?php echo $cash;?>);"/>
    </form>
    
</div>
<?php if(isset ($_SESSION[auth]) && $_SESSION[auth] == 1){ ?>
<script language="javascript">
   
    var min = 1;
    var sec = 30;
    var timerid;
    timerid = setInterval(timer,1000); /* запускаем таймер */
    
   function _insertVote(ID, fig){
       
            var obj = document.getElementById(ID); 
       
            document.getElementById('fig').value = fig;

            obj.style.display = "block";            
      
            var vt = document.getElementById('vt');
            
            vt.focus();
            
            vt.select();
   }
</script>
<?php } ?>