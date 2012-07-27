/* 
 * 30/5/2012
 */
				
/* Создание нового объекта XMLHttpRequest для общения с Web-сервером */
function getHTTPRequestObject() {
  var xmlHttpRequest;
  /*@cc_on
  @if (@_jscript_version >= 5)
  try {
    xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (exception1) {
    try {
      xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (exception2) {
      xmlHttpRequest = false;
    }
  }
  @else
    xmlhttpRequest = false;
  @end @*/
 
  if (!xmlHttpRequest && typeof XMLHttpRequest != 'undefined') {
    try {
      xmlHttpRequest = new XMLHttpRequest();
    } catch (exception) {
      xmlHttpRequest = false;
    }
  }
  return xmlHttpRequest;
}
 
var httpRequester = getHTTPRequestObject(); /* Когда страница загрузилась, создаем xml http объект */
