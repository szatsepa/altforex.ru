<?php

/*
 * created by arcady.1254@gmail.com 26/4/2012
 */
$date_m = $attributes[year_m]."-".$attributes[month_m]."-".$attributes[day_m];

$date_M = $attributes[year_M]."-".$attributes[month_M]."-".$attributes[day_M];



$query = "SELECT * FROM election WHERE DATE(date_change) BETWEEN '$date_m' AND '$date_M' ORDER BY id DESC";

$result = mysql_query($query) or die($query);

$election = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($election, $var);
}

mysql_free_result($result);

//print_r($election);
?>
