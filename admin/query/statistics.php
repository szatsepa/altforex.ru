<?php

/*
 * created by arcady.1254@gmail.com 23/3/2012
 */

$statistics = array();

$figures = array('square'=>'квадрат', 'circle'=>'круг', 'triangle'=>'треугольник');


$round = $attributes[rid];

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

?>

