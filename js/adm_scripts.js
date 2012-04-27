/* 
 * created by arcady.1254@gmail.com  28/3/2012
 */

function _entryA(ID){
    
    var obj = document.getElementById(ID);
    
    
}
function _delUserWindow(id){
    
    if(confirm("Вы действительно желаете удалить игрока?")){
        var str = 'http://altforex.ru/admin/index.php?act=delu&uid='+id;
    }else{
        var str = 'http://altforex.ru/admin/index.php?act=players';
    }
    document.location.href = str;
}
function _redUserWindow(id){
    var str = 'http://altforex.ru/admin/index.php?act=redu&uid='+id;
    document.location.href = str;
}
function _regUser(ID){
    var obj = document.getElementById(ID);
    document.write("<form action='#' method='post'><input type='hidden' name='uid' value='"+obj.uid.value+"'/><input type='hidden' name='cash' value='"+obj.cash.value+"'/><input type='hidden' name='status' value='"+obj.element.value+"'/></form>");
    document.forms[0].submit();
}