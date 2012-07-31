<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$code = $_POST[code];

$email = $_POST[email];

$out['ok']=NULL;

$query = "SELECT Count(id) FROM customers WHERE email = '$email'";

$result = mysql_query($query);

$row  = mysql_fetch_row($result);

if($row[0] == 0){
    $query = "SELECT Count(id) FROM customers WHERE code = '$code'";

    $result = mysql_query($query);

    $row  = mysql_fetch_row($result);
    
    if($row[0] == 0){
        $query = "INSERT INTO customers (code,email,activ) VALUES ('$code','$email',1)";

        $result = mysql_query($query) or die($query);

        $id = mysql_insert_id();

        $message ="Здравствуйте! Почтовый ящик  - $email зарегистрирован на bong.1gb.ru.\r\n Пароль для входа - $code.\r\nДля активации аккаунта перейдите по ссылке - http://brioso-lab.ru/index.php?act=activation&id=$id&code=$code\r\n C уважением. Администрация. ";              

        $headers = 'From: administrator@bong.1gb.ru\r\n';

        $headers  .= 'MIME-Version: 1.0' . "\r\n";

        $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
        
        $to= $row[name]." ".$row[surname]."<".$row[email].">" ; 

        $out = array();

        if(mail($to, 'Регистрация', $message, $headers)){
            $out['ok']=1; 
        }
    }else{
        $out['ok'] = 6;        
    }
}else{
    $out['ok'] = 2;    
}

$out['query'] = $query;


echo json_encode($out);

mysql_close();
?>
