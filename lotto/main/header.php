<?php
header('Content-Type: text/html; charset=utf-8');
 echo '<?xml version="1.0" encoding="utf-8"?>'; 
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">

<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>LOTTO</title>
        <meta name="title" content="LOTTO" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection" />
        <link href="css/jquery.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui-1.css" rel="stylesheet" type="text/css"/>
       
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>
        <script type="text/javascript" src="js/my_request.js"></script>
        <script type="text/javascript" src="js/in_form.js"></script>
        <script type="text/javascript" src="js/ticket_check.js"></script>
        <script type="text/javascript" src="js/<?php echo $_GET[act];?>.js"></script>
        <script type="text/javascript" src="js/queryLoader.js"></script>
        
</head>
    <body onload="">
 <script type="text/javascript">
    var customer = new Object();
</script>
<?php
if(isset($user)){
    ?>
<script type="text/javascript">
    
 var customer = {id:<?php echo $user->data[id];?>,name:'<?php echo $user->data[name];?>',surname:'<?php echo $user->data[surname];?>',email:'<?php echo $user->data[email];?>',phone:'<?php echo $user->data[phone];?>'};
    
</script>
    <?php
}
 ?>
        <div class="main"> 
