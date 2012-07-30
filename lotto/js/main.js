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
        
        var table_btn_array = new Array();
        
        var A_array = new Array();
        
        var B_array = new Array();
        
        var C_array = new Array();
        
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

        
        $("#as td").each(function(){
            
            $.each(this.children,function(i){
                table_btn_array.push(this.id);
            }) ;
        });
        
        
        $("#quick_button").mousedown(function(){
            while(C_array.length < 15){
                var pos =  Math.ceil(Math.random() * 90);
                var inp = pos;
                if(pos < 10){
                    inp = "0"+inp;
                }
                _check_Point(inp); 
            }

        });
        
        $("#clear_button").mousedown(function(){
            
           $.each(input_array,function(){
               
               $("#"+this).val('');
               
           });
           $.each(table_btn_array,function(){
               
               $("#"+this).attr({'disabled':false});
               
           });
           for(var i = 0;i<8;i++){
               check_B[i]=check_C[i]=0;
           }
           while(A_array.length){
               A_array.pop();
           }
           while(B_array.length){
               B_array.pop();
           }
           while(C_array.length){
               C_array.pop();
           }
           in_elt = 0;
           n = 0;
        });
        
                
        $(".my_button").mousedown(function(){
            
            var dt = this.id;
            var dis = $("#"+this.id).attr('disabled');
            
            if(dis != 'disabled'){
               _check_Point(dt); 
            }
            $("#"+this.id).attr({'disabled':true});
        });
        
        function _check_Point(dt){
            var num = parseInt(dt);
            var row = Math.floor(num/10);
            if(in_elt>=0 && in_elt<=4){
                    
                    for(var i = (row*10);i<(row*10+10);i++){
                        $("#"+table_btn_array[i]).attr("disabled", "disabled");
                    }
//                     
                    A_array.push(dt);
                    
                    if(A_array.length == 5){
                        $.each(table_btn_array,function(){
               
                            $("#"+this).attr({'disabled':false});

                        });
                        $.each(A_array,function(){
               
                            $("#"+this).attr({'disabled':true});

                        });
                    }
                }else if(in_elt>=5 && in_elt<=14){
                    if ((num >= 1) && (num <= 10)){check_B[0]++;}
                    else if ((num >= 11) && (num <= 20)){check_B[1]++;}
                    else if ((num >= 21) && (num <= 30)){check_B[2]++;}			
                    else if ((num >= 31) && (num <= 40)){check_B[3]++;}
                    else if ((num >= 41) && (num <= 50)){check_B[4]++;}	
                    else if ((num >= 51) && (num <= 60)){check_B[5]++;}			
                    else if ((num >= 61) && (num <= 70)){check_B[6]++;}
                    else if ((num >= 71) && (num <= 80)){check_B[7]++;}
                    else if ((num >= 81) && (num <= 90)){check_B[8]++;}
                    var nr = 0;
                    $.each(check_B,function(i){
                        if(this == 2){
                            for(var i = nr*10; i<(nr*10+10);i++){
                                $("#"+table_btn_array[i]).attr("disabled", "disabled");
                            }
                        }    
                        nr++;
                    });
                    B_array.push(dt);
                    if(B_array.length == 10){
                        $.each(table_btn_array,function(){
               
                            $("#"+this).attr({'disabled':false});

                        });
                        $.each(B_array,function(){
               
                            $("#"+this).attr({'disabled':true});

                        });
                        $.each(A_array,function(){
               
                            $("#"+this).attr({'disabled':true});

                        });
                    }
                }else if(in_elt>=15 && in_elt<=30){
                    if ((num >= 1) && (num <= 10)){check_C[0]++;}
                    else if ((num >= 11) && (num <= 20)){check_C[1]++;}
                    else if ((num >= 21) && (num <= 30)){check_C[2]++;}			
                    else if ((num >= 31) && (num <= 40)){check_C[3]++;}
                    else if ((num >= 41) && (num <= 50)){check_C[4]++;}	
                    else if ((num >= 51) && (num <= 60)){check_C[5]++;}			
                    else if ((num >= 61) && (num <= 70)){check_C[6]++;}
                    else if ((num >= 71) && (num <= 80)){check_C[7]++;}
                    else if ((num >= 81) && (num <= 90)){check_C[8]++;}
                    var nr = 0;
                    $.each(check_C,function(i){
                        if(this == 3){
                            for(var i = nr*10; i<(nr*10+10);i++){
                                $("#"+table_btn_array[i]).attr("disabled", "disabled");
                            }
                        }    
                        nr++;
                    });
                    C_array.push(dt);
                    if(C_array.length == 15){
                        $.each(table_btn_array,function(){
               
                            $("#"+this).attr({'disabled':false});

                        });
                        $.each(C_array,function(){
               
                            $("#"+this).attr({'disabled':true});

                        });
                        $.each(B_array,function(){
               
                            $("#"+this).attr({'disabled':true});

                        });
                        $.each(A_array,function(){
               
                            $("#"+this).attr({'disabled':true});

                        });
                    }
                }
                $("#"+input_array[in_elt]).val(dt);
                in_elt++;
                return false;
        }
});

