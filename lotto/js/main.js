/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return;
	}
        
        var input_array = new Array();
        
        var in_elt = 0;
        
        var n = 0;
        
        $('form').each(function(nf, myForm){
            // Перебираем элементы формы: input:text (текстовые поля)
            $('#' + $(myForm).attr('id') + ' input:text').each(function(nf, inputData){
                var input_id = inputData.id;
                input_array.push(input_id);
                n++;
            });
        });
        
        $("#quick_button").mousedown(function(){
            
            var tmp_arr = input_array;
            
            for(var i = 0;i<tmp_arr.length;i++){
                var pos =  Math.ceil(Math.random() * 90);
                var inp = pos;
                if(pos < 10){
                    inp = "0"+inp;
                }
                $("#"+tmp_arr[i]).val(inp);
            }

        });
        $("#clear_button").mousedown(function(){
            
           $.each(input_array,function(){
               
               $("#"+this).val('');
               
           });
           
        });
        $(".my_button").mousedown(function(){
            var dt = this.id;
            $("#"+input_array[in_elt]).val(dt);
            $("#"+dt).attr({'disabled':'disabled'});
            in_elt++;
        });
});

