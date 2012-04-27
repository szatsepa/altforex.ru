<?php

/*
 * created by arcady.1254@gmail.com 28/3/2012
 */
?>
<div class="users">
    <?php 
$header_array = array('Имя','Фамилия','Е-мейл','Статус','Баланс','Удалить','Редактировать'); 

?>
    <table border="0" width="800">
        <thead>
            <tr style="font-size: 14px;font-weight: bold;text-align: center;">
                <?php
                    foreach ($header_array as $value) {
                        echo "<td>$value</td>";
                    }
                ?>
            </tr>
        </thead>
        <tbody style="font-weight: normal;text-align: left;">
                    <?php
                    foreach ($users->data as $value) {
                        echo " <tr>";
                        echo "<td>$value->name</td><td>$value->surname</td><td>$value->email</td><td>$value->element</td><td>$value->votes</td><td><a href='#' onclick='javascript:_delUserWindow($value->id);'>Удалить</a></td><td><a href='#' onclick='javascript:_redUserWindow($value->id);'>Изменить</a></td>";
                        echo "</tr>";
                    }
           ?>
        </tbody>
    </table>
</div>