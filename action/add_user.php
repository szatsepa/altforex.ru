<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */

$surname = quote_smart($attributes[surname]);

$name = quote_smart($attributes[name]);

//$patronymic = quote_smart($attributes[patronymic]);
//
//$residens = quote_smart($attributes[residens]);

$email = quote_smart($attributes[email]);

$phone = "$attributes[phone]";

$word = quote_smart($attributes[word]);

//$bank_card = quote_smart($attributes[bank_card]);
//
//$eps = quote_smart($attributes[code]);

$query = "INSERT INTO users (surname,
                                 name,
                                 email,
                                 phone,
                                 key_code)
                 VALUES 
                        ($surname, 
                         $name,
                         $email,
                         $phone,
                         $word)";

$result = mysql_query($query) or die($query);


$id = mysql_insert_id();

header("location:index.php?act=regu&id=$id"); 
?>
