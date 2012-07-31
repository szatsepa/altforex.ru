<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$id = intval($_POST[id]);

$query = "SELECT SUM(c.amount) AS amount, SUM(c.amount*p.price) AS cash  FROM cart AS c, pricelist AS p   WHERE c.customer = $id  AND p.artikul = c.artikul";

$result = mysql_query($query);

$cart = mysql_fetch_assoc($result);

echo json_encode($cart);

mysql_close();
?>
