<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="vrWrapper">
    
        <div id="wr" class="wr" style="margin: 12px auto;">
            <div id="indicator"></div>
            <div class='loginBlock' id="signup">
                <div class="closer">X</div>
                <label for="email">Email:</label> <input id="email" type="text" class='textinput' />
                <label for="password">Пароль:</label> <input id="password" type="password" class='textinput' />
                <label for="passwordAgain">Пароль еще раз:</label> <input id="passwordAgain" type="password" class='textinput' />
                <div id="error0" class="error">
                </div>
                <div id="message1" class="message">
                </div>
                <div class='buttonDiv'>
                    <input id="registerButton" type="button" value="Зарегистрироваться"/></div>
                    
                <div class='additional'>
                    <a name="" id="rem_r" style="text-decoration: underline;cursor: pointer;">Вспомнить пароль</a> 
                    <a name="" id="log_r" style="text-decoration: underline;cursor: pointer;">Войти</a>
                </div>
             </div>  

            <div class='loginBlock' id="signin">
                <div class="closer">X</div>
            <label for="email">Email:</label> <input id="loginEmail" type="text" class='textinput'/>
            <label for="password">Пароль:</label> <input id="loginPass" type="password" class='textinput'/>
                <div id="error1" class="error">
                </div>
                <div class='buttonDiv'>
                    <input id="loginButton" type="button" value="Войти"/>
                </div>
                <div class='additional'>
                    <a name="" id="rem_l"  style="text-decoration: underline;cursor: pointer;">Вспомнить пароль</a> 
                    <a name="" id="reg_l" style="text-decoration: underline;cursor: pointer;">Зарегистрироваться</a>
                </div>
            </div>
            <div id="result"></div> 
            
            
            <div class='loginBlock' id="remindPass">
                <div class="closer">X</div>
                <div class="description">
                    Чтобы вспомнить пароль, вспомните для начала хотя бы email.
                </div>
                <label for="email">Email:</label> <input id="remindEmail" type="text" class='textinput' />
                <div id="error2" class="error">
                </div>
                <div id="message0" class="message">
                </div>
                <div class='buttonDiv'>
                    <input id="remindButton" type="button" value="Выслать пароль"/></div>
                <div class='additional'>
                    <a name="" id="log_rm" style="text-decoration: underline;cursor: pointer;">Войти</a> 
                    <a name="" id="reg_rm" style="text-decoration: underline;cursor: pointer;">Зарегистрироваться</a></div>
            </div>
        </div>
    </div>