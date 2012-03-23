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
  
//   alert(email); 
  
   if(!_emlWalidation(email)){
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }

    document.write("<form action='index.php?act="+act+"' method='post'><input type='hidden' name='user_id' value='"+obj.user_id.value+"'/><input type='hidden' name='surname' value='"+obj.surname.value+"'/><input type='hidden' name='name' value='"+obj.name.value+"'/><input type='hidden' name='email' value='"+obj.email.value+"'/><input type='hidden' name='phone' value='"+obj.phone.value+"'/><input type='hidden' name='word' value='"+obj.word.value+"'/></form>");
    document.forms[0].submit();
    
}
function _goAbout(ID){
    
     var uid = document.getElementById(ID).id.value;
        
     var email = document.getElementById(ID).email.value;
       
     document.write("<form id='gohach' action='index.php?act=regu' method='post'><input type='hidden' name='id' value='"+uid+"'/><input type='hidden' name='email' value='"+email+"'/></form>");
     document.forms[0].submit();
}
function timer()
{
    
  sec--; /* уменьшаем на одну секунду */
  if (sec<0) /* следующая минута */
  {
    sec = 59;
    min--;
  }
  var smin = ''+min;
  var ssec = ''+sec;
//  if (smin.length<2) smin = '0'+smin; /* добавляем ведущие нули */
  if (ssec.length<2) ssec = '0'+ssec;
  document.getElementById('time').innerHTML = smin+':'+ssec; /* и выводим на страницу текущее значение */
  if (min==0 && sec==0)
  {
    clearInterval(timerid); /* останавливаем таймер */
 /* и производим какие-то свои действия */
    document.location.href = "http://altforex.ru/index.php?act=main";
  }
}
    
function _goRmail(aga, whot, cash){
    
    if(cash != 0 && aga != 0){
         
         var whot_array = new Array('квадрат','круг','треугольник');

                 if(confirm("\t\tВы желаете отдать голос за "+whot_array[whot]+"?\n С вашего счета будет списано 5 (или скоканада) балов")){
                     document.location='http://altforex.ru/index.php?act=vote&whot='+whot; 
                 }else{
                     document.location='http://altforex.ru/index.php?act=main'; 
                 }
         
    }else if(cash != 0 && aga == 0){
        alert("На вашем счете не достаточно средств!\r\n\t\tНадо бы пополнить!"); 
    }else{
        document.location='http://altforex.ru/index.php?act=rmail';
    }   
} 
function _gameStatistics(ID){
    
    var stat = window.open('http://altforex.ru/index.php?act=stat', 'statisyics', 'location,width=600,height=400,top=0'); 
}