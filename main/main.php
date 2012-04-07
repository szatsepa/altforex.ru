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
<div class="element">
  <?php
  for($i=0;$i<$games->count;$i++){
      $dis='';
      if(($i+1) == $actual_game->level){
          $dis = 'disabled';
          $str_style = "style='color: green;'";
      }else{
          $str_style = "style='color: black;'";
      }
      ?>
    <input class="element" <?php echo $str_style;?> type="button" value="<?php echo $status_array[$i];?>" onclick="javascript:document.location.href = 'http://altforex.ru/index.php?act=main&gid=<?php echo $games->data[$i][id];?>';" <?php echo $dis;?>/>
    <?php
  }

  if(isset ($_SESSION[auto]) && $_SESSION[auto]==1){
      $str_value = "AUTO OFF";
      $str_color = "color: red;";
      $str_out = "index.php?act=main&auto=0";
  }else{
      $str_value = "AUTO ON";
      $str_color = "color: black;";
      $str_out = "index.php?act=main&auto=1";
  }
  ?>
    <div class="auto_on">
        <input class="element" style="<?php echo $str_color;?>" type="button" value="<?php echo $str_value;?>" onclick="javascript:document.location.href = '<?php echo $str_out;?>';"/>
    </div>
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
<?php if(isset ($_SESSION[auth]) && $_SESSION[auth] == 1 && !isset ($_SESSION[auto])){ ?>
<script language="javascript">
   
    var min = 1;    
    var sec = 30;  
    var timerid;
    timerid = setInterval(timer,1000); /* запускаем таймер */

</script>
<?php }else if(isset ($_SESSION[auto]) && $_SESSION[auto] == 1){ ?>
<script language="javascript">
   
     var min = 1;    
    var sec = 30;  
    var timerid;
    var auto;
    auto = setInterval(function(){document.location.href="index.php?act=main&whot=<?php echo $_SESSION[auto_task][figure_id]; ?>&votes=<?php echo $_SESSION[auto_task][count];?>&at=1"},30000); 
    timerid = setInterval(timer,1000); 
    /* запускаем таймер */
</script>    
<?php } ?>