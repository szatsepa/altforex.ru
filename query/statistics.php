<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012
 */

$statistics = array();

$figures = array('square'=>'квадрат', 'circle'=>'круг', 'triangle'=>'треугольник');
/*
 * выбираем последний записаный раунд 
 */
$query = "SELECT MAX(id) FROM election_archiv";

$result = mysql_query($query) or die($query);

if($result){
    
    $row = mysql_fetch_row($result);

    $round = $row[0] + 1;
    
}else{
    
    $round = 1;
}
/*
 * определяем ставки по фигурам и участникам в актуальном раунде
 */
foreach ($figures as $key => $value) { 
    
    $query = "SELECT u.email,
                     ('$key') AS figures,  
                     r.point,
                     ($round) AS round, 
                     e.date_event                      
                FROM `election` AS e 
                JOIN `figures` AS f 
                JOIN `rate` AS r 
                JOIN users AS u 
                ON ($round) = r.election_id 
                AND r.figure_id = f.id 
                AND f.name = '$key' 
                AND r.user_id = u.id
                ORDER BY u.email";
    
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
    document.write("<br/><br/><p>К сожалению даных по этому раунду еще нет.</p><br/><p><input type='button' value='Close' onclick='javascript:window.close();'/></p>");
</script>
<?php
}

$all = 0;

?>

