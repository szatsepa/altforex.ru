<?php

/*
 * created by arcady.1254@gmail.com 29/3/2012
 */
$user_id = $user->data[id];

$query = "SELECT auto FROM user_task WHERE user_id = $user_id GROUP BY auto";

$result = mysql_query($query) or die($query);

if(!$result){
    $auto = 1;
}else{
    $row = mysql_fetch_row($result);
    
    if($row[0] == 0){
        $auto = 1;
    }  else {
        $auto = 0;
    }
}
 
$query = "UPDATE user_task SET auto = $auto WHERE user_id = $user_id";

$result = mysql_query($query) or die($query);

$aff = mysql_affected_rows();

if($aff == 0){
    $query = "INSERT INTO user_task (auto, user_id) VALUES (1, $user_id)";
    
    $result = mysql_query($query) or die($query);
    
    $ins_id = mysql_insert_id();
}
if($aff != 0 or $ins_id){
    header("location:index.php?act=regu");
}
?>
