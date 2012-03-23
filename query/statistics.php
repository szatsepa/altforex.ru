<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012
 */

$statistics = array();

$figures = array('square'=>'квадрат', 'circle'=>'круг', 'triangle'=>'треугольник');

foreach ($figures as $key => $value) {
    
    $query = "SELECT u.email,
                     ('$key') AS figures,  
                     r.point,
                     ((SELECT MAX(id) FROM election_archiv)+1) AS round, 
                     e.date_event                      
                FROM `election` AS e 
                JOIN `figures` AS f 
                JOIN `rate` AS r 
                JOIN users AS u 
                ON ((SELECT MAX(id) FROM election_archiv)+1) = r.election_id 
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

if(!count($statistics))header ("location:index.php?act=main");

$all = 0;

?>

