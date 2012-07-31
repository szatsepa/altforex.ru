<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

if(!isset($_SESSION)){

    session_start();    
}

$user = array();

$email = $_POST[email];

$code = $_POST[code];

$query = "SELECT  id,
                    surname, 
                    name, 
                    email, 
                    phone 
            FROM customers 
            WHERE code='$code' AND 
                  email='$email'";

$result = mysql_query($query);

$cnt = mysql_num_rows($result);

if($cnt != 0){
    $user = mysql_fetch_assoc($result);
    $user['ok']=1;
}else{
    $user['ok']=NULL;
}

$_SESSION[id] = $user[id];

$_SESSION[auth] = 1;

setcookie("di", $_SESSION['id'], time()+(3600*12));

$user['coo'] = $_COOKIE;

echo json_encode($user);

mysql_close();
?>
