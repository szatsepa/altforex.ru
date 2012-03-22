<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */
$id = intval($attributes[user_id]);

$surname = quote_smart($attributes[surname]);

$name = quote_smart($attributes[name]);

$email = quote_smart($attributes[email]);

$phone = "$attributes[phone]";

$word = quote_smart($attributes[word]);

$query = "UPDATE users 
                           SET surname = $surname, 
                               name = $name,
                               email = $email,
                               phone = '$phone',
                               key_code = $word
                            WHERE id = $id";

$result = mysql_query($query) or die($query);

header("location:index.php?act=regu&id=$id");

?>
