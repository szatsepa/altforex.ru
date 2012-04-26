<?php
header('Content-Type: text/html; charset=utf-8');
 echo '<?xml version="1.0" encoding="utf-8"?>';
 
 if($_SESSION[auth] == 1){
    $img_prefix = $images_array[$actual_game->level];
}  else {
    $img_prefix = "o2";
}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">

<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
        <meta name="title" content="<?php echo $title; ?>" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />
        <script type="text/javascript" src="../js/js_scripts.js"></script>
</head>
    <body onload="">
       <div class="main"> 
         <?php if($_SESSION[auth] == 1 && $attributes[act] == 'main'){   ?>
        <div class="main_0" style="background-image: url('../images/<?php echo $img_prefix;?>_bg.png');">
           <?php }else{ ?>
            <div class="main_0"> 
<!--                 style="background-color: #eeeeee;width: 1024px;"-->
            <?php }?>