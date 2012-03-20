/* 
 * created by arcady.1254@gmail.com 5/3/2012
 * bedlam
 */

function _emlWalidation(eml){
     
    var email = eml;
        
        var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        
        if (!email.match(reg)){
            return false;
        }else{
            return true;
        }
}
function _mySend(ID, auth){
    
    var au = 1;
    
    var obj = document.getElementById(ID);
        
        if(au == 0){
                document.write("<form action='index.php?act=info' method='post'><input type='hidden' name='err' value='1'/><input type='hidden' name='email' value='"+obj.send.value+"'/></form>");
                document.forms[0].submit();
        }else{

        var da = obj.recipe.value;
        
        var recipe = da;
        
        var yes = _emlWalidation(da);
        
        if (!yes) {
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }else{
            yes = _emlWalidation(obj.send.value);
            
            if (!yes) {
                 alert("Пожалуйста, проверте правильно ли введен адрес отправителя.");
             }else{
                document.write("<form action='index.php?act=epsmail' method='post'><input type='hidden' name='recipe' value='"+recipe+"'/><input type='hidden' name='send' value='"+obj.send.value+"'/></form>");
                document.forms[0].submit();
                }                 
        }
     }
}
function _addMail(ID){
        
        var obj = document.getElementById(ID);
        
        var email = obj.email.value;
        
        var yes = _emlWalidation(email);
        
        if(!yes){
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }
        else
        {
            document.location = "http://e-ps.me/index.php?act=addmail&email="+email;
        }
        
}
function _writeUser(ID){
   
   var nus = parseInt(ID.substr(9,1));
   
   var act = "";
   
   var upd = 0;
   
   if(nus == 0){
       act = "addus";  
   }else{
       act = "chngus";
   }
    
  var obj = document.getElementById(ID);
  
  if(obj.upd.checked){
      upd = 1;
  }

    document.write("<form action='index.php?act="+act+"' method='post'><input type='hidden' name='upd' value='"+upd+"'/><input type='hidden' name='code' value='"+obj.code.value+"'/><input type='hidden' name='user_id' value='"+obj.user_id.value+"'/><input type='hidden' name='surname' value='"+obj.surname.value+"'/><input type='hidden' name='name' value='"+obj.name.value+"'/><input type='hidden' name='patronymic' value='"+obj.patronymic.value+"'/><input type='hidden' name='residens' value='"+obj.residens.value+"'/><input type='hidden' name='email' value='"+obj.email.value+"'/><input type='hidden' name='phone' value='"+obj.phone.value+"'/><input type='hidden' name='word' value='"+obj.word.value+"'/><input type='hidden' name='bank_card' value='"+obj.bank_card.value+"'/></form>");
    document.forms[0].submit();
   
}
function _copyToclipboard(text){
if (window.clipboardData){
    window.clipboardData.setData("Text", text);alert ("Нужная строка добавлена в буфер обмена.");
}else {
    var DummyVariable = prompt('Буфер обмена заблокирован браузером, нажмите Ctrl+C для копирования этой строки:',text);
}
}
function _changeCode(ID){
     
    var obj = document.getElementById(ID);
    
    if(confirm("Вы действительно хотите заменить код?")){
        document.write("<form action='index.php?act=chcode' method='post'><input type='hidden' name='email' value='"+obj.email.value+"'/></form>");
        document.forms[0].submit();
    }else{
        return false;
    }
    
}