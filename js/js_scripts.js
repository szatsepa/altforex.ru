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
    if (ssec.length<2) ssec = '0'+ssec;
  document.getElementById('time').innerHTML = smin+':'+ssec; /* и выводим на страницу текущее значение */
  if (min==0 && sec==0)
  {
    clearInterval(timerid); 
    /* 
     * останавливаем таймер 
     */
 /* 
  * и производим какие-то свои действия 
  */
    document.location.href = "http://altforex.ru/index.php?act=main";
  }
}
    
function _goRmail(aga, whot, cash){
    /*
     * ето главная функция - голосование если авторизован или переход к регистрации ящика
     */
    var obj = document.getElementById(whot);
    
    var fig = obj.figure_id.value;
    
    var votes = obj.votes.value;
    
    if(cash != 0 && aga != 0){
         
         var whot_array = new Array('квадрат','круг','треугольник');

                 if(confirm("Вы желаете отдать голос за "+whot_array[fig]+"?\n\t\t\tВсего "+votes)){
                     document.location='http://altforex.ru/index.php?act=main&whot='+fig+'&votes='+votes; 
                 }else{
                     document.location='http://altforex.ru/index.php?act=main'; 
                 }
         
    }else if(cash != 0 && aga == 0){
        alert("Для голосования не достаточно голосов!\r\n\t\tНадо бы пополнить!"); 
    }else{
        document.location='http://altforex.ru/index.php?act=rmail';
    }   
} 
function _gameStatistics(ID){
    
    var stat = window.open('http://altforex.ru/index.php?act=stat', 'statisyics', 'location,width=600,height=400,top=0'); 
}
function _chngAuto(ID){
    var obj = document.getElementById(ID);
    var str = '';
    for(var i in obj.figure[0]){
        if(i=='chcked'){
            str += i.value+"<br/>";
        }         
    }
   
    str += "id="+obj.id.value+";round="+obj.round.value+";count="+obj.count.value+";figure="+obj.figure+";activ=1"; 
   document.write(str);
//    document.write("<form action='index.php?act=chngvote' method='post'><input type='text' name='auto' value='"+str+"'/><form>");
//    document.forms[0].submit();
}
function _onauto(ID){
    document.location = "index.php?act=onauto";
}
function _autoMove(figure,votes){
    
    document.write("<form action='index.php?act=main' method='post'><input type='hidden' name='whot' value='"+figure+"'/><input type='hidden' name='votes' value='"+votes+"'</form>");
    document.forms[0].submit();
}
    
function _insertVote(ID, fig, status){

    if(status < 0){
        alert("Вы не можете учавствовать в этой игре\n\t - не достаточно голосов!");
    }else{
        var obj = document.getElementById(ID); 

        document.getElementById('fig').value = fig;

        obj.style.display = "block";            

        var vt = document.getElementById('vt');

        vt.focus();

        vt.select();
    }

}
function _deleteTask(ID){
    
    var obj = document.getElementById(ID);
    
    if(confirm("Удалить строку задания?")){
        document.location.href = "index.php?act=deltask&row="+obj.row.value;
    }
}