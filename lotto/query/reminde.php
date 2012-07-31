<?php

/*
 * 29/5/2012
 */
include 'connect.php';

$email = $_POST[email];

$out['ok']=NULL;

$query = "SELECT code FROM customers WHERE email = '$email'";

$result = mysql_query($query) or die ($query);

$code = NULL;

while ($row = mysql_fetch_assoc($result)){
        $code = $row[code];
    }

if(!$code){
    $out['ok']=2;
}else{
    
    $message ="Здравствуйте! Ваш пароль(код доступа)  - $code зарегистрирован на bong.1gb.ru.\r\n C уважением. Администрация. ";              

    $headers = 'From: administrator@bong.1gb.ru\r\n';

    $headers  .= 'MIME-Version: 1.0' . "\r\n";

    $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

    $out=array('query' => "$email\n, 'Регистрация',\n $message,\n $headers",'code'=>$code);
    
    $to= '"'.$email.'"'; //обратите внимание на запятую" <"..">"
    
//    $to .= "Arcady <arcady.1254@gmail.com>";  

    if(mail($to, 'Ваш пароль', $message, $headers)){

        $out['ok']=1;
    
    }
    
 }
 
echo json_encode($out);

mysql_close();

?>
