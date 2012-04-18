<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012
 */

$statistics = array();

$figures = array('square'=>'квадрат', 'circle'=>'круг', 'triangle'=>'треугольник');
/*
 * выбираем последний записаный раунд 
 */
//$query = "SELECT MAX(id) FROM election_archiv";
//
//$result = mysql_query($query) or die($query);
//
//if($result){
//    
//    $row = mysql_fetch_row($result);
//
//    $round = $row[0] + 1;
//    
//}else{
//    
//    $round = 1;
//}
$round = $_SESSION[game_id];

unset($_SESSION[game_id]);
/*
 * определяем ставки по фигурам и участникам в актуальном раунде
 */
foreach ($figures as $key => $value) { 
    
    $query = "SELECT u.email, 
                    f.name AS figures, 
                    r.point, 
                    r.election_id AS round, 
                    r.time AS date_event
               FROM rate AS r, users AS u, figures AS f
              WHERE r.election_id =$round 
                AND u.id = r.user_id
                AND f.id = r.figure_id
                AND f.name = '$key'";
    
    
    
    $result = mysql_query($query) or die ($query);
    
    while ($var = mysql_fetch_assoc($result)){
        
        array_push($statistics, $var);
        
    }
}

mysql_fetch_array($result);

sort($statistics);
/*
 * если раунд не начат(ставок еще не было) сообщаем об этом
 */
if(!count($statistics)){
    
    ?>
<script language="javascript">
    document.write("<br/><br/><br/><br/><br/><br/><br/><p style='font-size: 16px; font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;К сожалению даных по этому раунду еще нет.</p><br/>");
</script>
<?php
}else{
    $all = 0;
     
    include 'main/statistics.php';
}



?>
<script type="text/javascript">
    function _wClose(){
       self.close();
    }
</script>
