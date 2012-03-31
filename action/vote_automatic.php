<?php

/*
 * created by arcady.1254@gmail.com 31/3/2012
 */
if(!isset($_SESSION)){

    session_start();  
}

include 'connect.php';
include '../classes/constitution.php';


$user_id = intval($_POST[id]);

$figure = intval($_POST[whot]) + 1;

$count = 1;

/*
 * выбираем последний записаный раунд 
 */

$query = "SELECT MAX(id) FROM election_archiv";

$qry_game = mysql_query($query) or die($query);

$row = mysql_fetch_row($qry_game); 

/*
 * актуальный раунд
 */

$game = $row[0] + 1;

/*
 * имя фигуры
 */

$qury_name = mysql_query("SELECT name FROM figures WHERE id = $figure");

$row = mysql_fetch_assoc($qury_name);

$name = $row[name];

unset ($row);

mysql_free_result($qury_name);


/*
 * добавляем в таблицу голос если соотв правилу №1
 */

$status_vote = close_game($figure, $user_id, $game);

if(!$status_vote){

/*
 *  создаем соотв запись в таблице
 */

    mysql_query("INSERT INTO rate (user_id, election_id, figure_id, point) VALUES ($user_id, $game, $figure, $count)");

/*
 * минусуем количество голосов в кошельке участника игры
 */ 
$query = "UPDATE my_account SET cash = (cash - $count) WHERE user_id = $user_id";

$result = mysql_query($query) or die ($query); 
/*
 * изменяем запись в таблице теккущего голосования и перезагружаем страницу
 */
if(mysql_affected_rows() > 0){
    
    $query = "UPDATE `election` SET `$name` = (`$name` + $count), date_change = now()";
    
    $result = mysql_query($query) or die ($query);
    /*
     * проверяем кошелек участника на наличие средств(голосов)
     */
    checkCash($user_id);
        
}
  
}else{
    $str_out = "&vote=$status_vote";
}

mysql_close($link);

header("location:http://altforex.ru/index.php?act=main&id=$user_id");



?>
