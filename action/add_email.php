<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 * 
 * добавляем нового участника или еси таковой (емайл) есть возвращаем пароль в почтовый ящик
 */

$email = $attributes[email]; 

/*
 * провверяем наличие почтового адреса в таблице
 */
$query = "SELECT Count(*) FROM users WHERE email = '$email'";

$res = mysql_query($query) or die ($query);

$row = mysql_fetch_row($res);

if($row[0] == 0){
    
    /*
     *ежели адреса в таблице нет добавляем на первом этапе код(пароль) и емейл
     */ 
    
    /*
 * генерируем код(пароль)
 */
$key_code = _cod(6, 3);

$query = "INSERT INTO users (email, key_code) VALUES ('$email', '$key_code')";

$result = mysql_query($query) or die($query);

$new_id = mysql_insert_id();

/*
 * добавляем пользователя в таблицу учета ставок
 */

$query = "INSERT INTO my_account (user_id) VALUES ($new_id)";

$result = mysql_query($query) or die($query);
/*
 * отправляем письмо и переходим на главную страницу
 */
    
    if(_gomail($email, $key_code)){ 
        
                 header("location:index.php?act=main&id=$new_id&email=$email");
        }
              
}else{
    
   /*
    *в противном случае выбираем пароль
    */
  $query = "SELECT key_code, id FROM users WHERE email = '$email'";
    
    $result = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_row($result);
    
    $key_code = $row[0];
    
    $user_id = $row[1];
    
   /*
    * и отправляем его письмом на указаный адрес после чего переходим на главную
    */
    
    _gomail($email, $key_code);
    
    header("location:index.php?act=main&id=$user_id&email=$email");
}
function _gomail($email, $key){ 

            $message ="Здравствуйте! Почтовый ящик  - $email зарегистрирован на altforex.ru.\r\n Пароль для входа - $key.\r\nВ личный кабинет для дачи показаний можно перейти по ссылке - http://altforex.ru/index.php?act=regu&pwd=$key\r\n C уважением. Администрация. ";              
             
            $headers = 'From: administrator@altforex.ru\r\n';
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
                    
            mail($email, 'Регистрация адреса', $message, $headers);
            
            return 1;
    
}
function _cod($num_cnt, $str_cnt){
    
   $cod = '';

$simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

for($i = 0;$i<$str_cnt;$i++){
    $cod .= $simbol_array[rand(0, count($simbol_array))];
}

for($i = 0;$i<$num_cnt;$i++){
    $cod .= rand(0, 9);
}

return $cod;
}
?>
