<?php
/*
 * To change this template, choose Tools |19/3/2012
 */
$color = quote_smart($attributes[colorDepth]);

$ip=$_SERVER['REMOTE_ADDR'];

$ip = quote_smart($ip);

if(!isset ($_SESSION[id])){
    $id = 0;
}  else {
    $id = intval($_SESSION[id]);
}

   
$resolution = quote_smart($attributes[scr_W]."x".$attributes[scr_H]);


$agent = quote_smart($_SERVER["HTTP_USER_AGENT"]);

$query = "INSERT INTO statistics 
                        (ip,
                        resolution,
                        agent,
                        colorDepth)
                VALUES ($ip,
                        $resolution,
                        $agent,
                        $color)";

$act_stat = mysql_query($query) or die($query);

header("location:index.php?act=main"); 
?>
