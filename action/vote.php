<?php

/*
 * created by arcady.1254@gmail.com 21/3/2012
 */

$user_id = intval($_SESSION[id]);

$figure = intval($attributes[whot]) + 1;

$count = 5;

$query = "SELECT MAX(id) FROM election_archiv";

$qry_game = mysql_query($query) or die($query);

$row = mysql_fetch_row($qry_game);

$game = $row[0] + 1;

$qury_name = mysql_query("SELECT name FROM figures WHERE id = $figure");

$row = mysql_fetch_assoc($qury_name);

$name = $row[name];

unset ($row);

mysql_free_result($qury_name);

mysql_query("INSERT INTO rate (user_id, election_id, figure_id, point) VALUES ($_SESSION[id], $game, $figure, $count)");

$query = "UPDATE my_account SET cash = (cash - $count) WHERE user_id = $user_id";

$result = mysql_query($query) or die ($query);

if(mysql_affected_rows() > 0){
    
    $query = "UPDATE `election` SET `$name` = (`$name` + $count)";
    
    $result = mysql_query($query) or die ($query);
    
    header("location:index.php?act=main");
    
}
?>
