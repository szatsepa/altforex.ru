<?php

/*
 * created arcady.1254@gmail.com 19/3/2012
 */

setlocale(LC_ALL, 'ru_RU.utf8');

    $link = mysql_connect("localhost:/tmp/mysqld.sock","altforex", "altmoney2") or die ("Ошибка");
        
    mysql_select_db("altforex_ru");
        
    mysql_query ("SET NAMES utf8");
    
    $document_root = $_SERVER["DOCUMENT_ROOT"];
    
    $host          = $_SERVER["HTTP_HOST"];
	
//    echo "document_root -> $document_root<br/>host -> $host";
        
    if (mysql_errno() <> 0) exit("Ошибка");
?>
