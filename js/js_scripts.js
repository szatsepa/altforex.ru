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
function _regUser(ID){
    
    var obj = document.getElementById(ID);
    
    var email = obj.email.value;
    
    if(!_emlWalidation(email)){
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }else{
                
            document.write("<form action='index.php?act=addm' method='post'><input type='hidden' name='email' value='"+email+"'/></form>");
            document.forms[0].submit();
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
  
  var email = obj.email.value;
  
   if(!_emlWalidation(email)){
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }

    document.write("<form action='index.php?act="+act+"' method='post'><input type='hidden' name='upd' value='"+upd+"'/><input type='hidden' name='code' value='"+obj.code.value+"'/><input type='hidden' name='user_id' value='"+obj.user_id.value+"'/><input type='hidden' name='surname' value='"+obj.surname.value+"'/><input type='hidden' name='name' value='"+obj.name.value+"'/><input type='hidden' name='patronymic' value='"+obj.patronymic.value+"'/><input type='hidden' name='residens' value='"+obj.residens.value+"'/><input type='hidden' name='email' value='"+obj.email.value+"'/><input type='hidden' name='phone' value='"+obj.phone.value+"'/><input type='hidden' name='word' value='"+obj.word.value+"'/><input type='hidden' name='bank_card' value='"+obj.bank_card.value+"'/></form>");
    document.forms[0].submit();
    
}