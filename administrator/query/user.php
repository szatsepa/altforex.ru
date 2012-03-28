<?php
/*
 * created by arcady.1254@gmail.com 28/3/2012
 */
if(isset ($attributes[status])){
    include 'action/user_redaction.php';
}
if(isset ($num_a) && $num_a == 1){
    
    header("location:index.php?act=players");
    ?>
<!--<script language="javascript">
    window.close();
</script>-->
<?php }

$user_id = intval($attributes[uid]);

$query = "SELECT u.id, u.name, u.surname, u.email, a.cash, e.name AS status, e.id AS element 
            FROM `users` u, `my_account` a, `elements` e 
            WHERE u.id = a.user_id AND a.element_id = e.id
            AND u.id = $user_id";

$result = mysql_query($query) or die($query);

$user = mysql_fetch_assoc($result);

//print_r($user);
//echo "<br/>";
$query = "SELECT * FROM elements";

$result = mysql_query($query) or die($query);

$elements_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($elements_array, $var);
}
//print_r($elements_array);
//echo "<br/>";
mysql_free_result($result);
?>
