<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    var customer;
    
    var i = 0;
    var k = 1;

    var check_B = new Array(0,0,0,0,0,0,0,0,0);
    var check_C = new Array(0,0,0,0,0,0,0,0,0);
</script>
<div id="content" style="height: 643px">
						
    <div class="page_title" style="height: 24px">
         <img src="images/border_s.jpg">
         <br>
    </div>
    <div class="login_content">
        <div id="ticket_form">
            <div id="ticket_form_txt">
                <p id="sale_ticket">КУПИТЬ БИЛЕТ</p>
                <p>Выберите счастливые числа или играйте <strong>случайную игру</strong>&nbsp;&nbsp;&nbsp;<input id="quick_button" type="button" value="Bim-Bam"></p>                                                   
            </div>
            <div id="selected">
                <div class="letters">A</div>
                    <form id="form_A">
                            <div class="fields" id="d_A">
                                <input readonly="readonly" id="A_1" name="area_code" maxlength="2" size="2" type="text">
                                <input readonly="readonly" id="A_2" name="area_code" maxlength="2" size="2" type="text">
                                <input readonly="readonly" id="A_3" name="area_code" maxlength="2" size="2" type="text">
                                <input readonly="readonly" id="A_4" name="area_code" maxlength="2" size="2" type="text">
                                <input readonly="readonly" id="A_5" name="area_code" maxlength="2" size="2" type="text">
                            </div>
                    <div class="clearas"></div>	<br>
		</form>
                <form id="form_B">
		<div class="letters">B</div>	
			<div class="fields">
                            <input readonly="readonly" id="B_6" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_7" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_8" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_9" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_10" name="area_code" maxlength="2" size="2" type="text">
                        </div>
			<div class="clearas"></div>
			<div class="letters">&nbsp;</div>
			<div class="fields">
                            <input readonly="readonly" id="B_11" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_12" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_13" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_14" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="B_15" name="area_code" maxlength="2" size="2" type="text">
                        </div>
			<div class="clearas"></div><br>
                </form>
                <form id="form_C">
		<div class="letters">C</div>
			<div class="fields">
                            <input readonly="readonly" id="C_16" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_17" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_18" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_19" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_20" name="area_code" maxlength="2" size="2" type="text">
                        </div>
			<div class="clearas"></div>
			<div class="letters">&nbsp;</div>
			<div class="fields">
                            <input readonly="readonly" id="C_21" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_22" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_23" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_24" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_25" name="area_code" maxlength="2" size="2" type="text">
                        </div>
			<div class="clearas"></div>
			<div class="letters">&nbsp;</div>
			<div class="fields">
                            <input readonly="readonly" id="C_26" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_27" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_28" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_29" name="area_code" maxlength="2" size="2" type="text">
                            <input readonly="readonly" id="C_30" name="area_code" maxlength="2" size="2" type="text">
                        </div>
		<br>
		</form>
            </div>
            <div id="numbers">
		
                <table id="as" align="center" border="0" cellpadding="0" cellspacing="1">
                    <colgroup>
                            <col class="as0">
                            <col class="as1">
                            <col class="as2">
                            <col class="as3">
                            <col class="as4">
                            <col class="as5">
                            <col class="as6">
                            <col class="as7">
                            <col class="as8">
                            <col class="as9">
                    </colgroup>
                    <tbody>
                        <?php
                        for($i = 0;$i < 9;$i++){
                            echo "<tr>";
                            for($ii = 1;$ii < 11;$ii++){
                                $ind = $i*10+$ii;
                                if($ind < 10){$ind = "0".$ind;}
                                echo "<td>
                                          <button type='button' class='my_button' value='$ind' id='$ind'>$ind</button>
                                        </td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="buy_btn_top" style="width: 372px; height: 207px">
                        <!--/button-->
                        &nbsp;<input id="clear_button" class="clear_btn" type="button" value="Сброс">
                        <span class="style1">
                            <br>
                        </span>
            </div>
        </div>
    </div>    
</div>
<div class="m_cart" id="my_cart"></div>

<?php
include 'in_form.php';
?>
