<?php

/*
 * created by arcady.1254@gmail.com
 */
?>

<div class="footer">
    <a class="footer" href="http://7905415.ru" target="_blank">kuznetsoff &#169; laboratory-2012</a>
</div>
<?php if($_GET[act]!= 'cart'){ ?>
<div id="preload"></div>

<script type="text/javascript">
	QueryLoader.selectorPreload = "body";
	QueryLoader.init();
</script>
<?php } ?>
    </body>


</html>
