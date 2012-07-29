/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

$('.my_button').click(function() {
			i++;
		    var numberz = $(this).val();
			//BIsjungiam(B1, B2, B3, B4, B5, B6, B7, B8, B9);
			//CIsjungiam(C1, C2, C3, C4, C5, C6, C7, C8, C9);
			if(i <5){
				$('.A'+i).val(numberz);
				//pildome("A");
				document.getElementById($('.A'+i).val()).disabled = true;
				AIsjungiam(numberz);
				}
			if (i == 5){		
				$('.A'+i).val(numberz);
				//pildome("A");
				document.getElementById($('.A'+i).val()).disabled = true;
				AIsjungiam(numberz);
				resetA();
				} 
			if (( i >= 6) && (i <=14)){
			    BCheck(numberz);
				$('.B'+i).val(numberz);
				//pildome("B");
				document.getElementById($('.B'+i).val()).disabled = true;
				BIsjungiam(B1, B2, B3, B4, B5, B6, B7, B8, B9);
				}
			if (i == 15){
				BCheck(numberz);
				$('.B'+i).val(numberz);
				//pildome("B");
				document.getElementById($('.B'+i).val()).disabled = true;
				BIsjungiam(B1, B2, B3, B4, B5, B6, B7, B8, B9);
				resetB();
				}
			if (( i >= 16) && (i <=30)){
			    CCheck(numberz);
				$('.C'+i).val(numberz);
				//pildome("C");
				document.getElementById($('.C'+i).val()).disabled = true;
				CIsjungiam(C1, C2, C3, C4, C5, C6, C7, C8, C9);
			}
		});
		$('#clear_button').click(function() {
			i = 0;
			k = 1;
			B1 = 0;
			B2 = 0;
			B3 = 0;
			B4 = 0;
			B5 = 0;
			B6 = 0;
			B7 = 0;
			B8 = 0;
			B9 = 0;
			C1 = 0;
			C2 = 0;
			C3 = 0;
			C4 = 0;
			C5 = 0;
			C6 = 0;
			C7 = 0;
			C8 = 0;
			C9 = 0;
			resetAll();
		});
	    $('#quick_button').click(function() {
			i = 0;
			k = 1;
			B1 = 0;
			B2 = 0;
			B3 = 0;
			B4 = 0;
			B5 = 0;
			B6 = 0;
			B7 = 0;
			B8 = 0;
			B9 = 0;
			C1 = 0;
			C2 = 0;
			C3 = 0;
			C4 = 0;
			C5 = 0;
			C6 = 0;
			C7 = 0;
			C8 = 0;
			C9 = 0;
			resetAll();
			var a=0;
			while (i<5) {
				i++;
				a = Math.ceil(Math.random()*90);
				if (a<10) a="0"+a;
				while ( document.getElementById(a).disabled ) {
					a = Math.ceil(Math.random()*90);
					if (a<10) a="0"+a;
				}
				
				$('.A'+i).val(a);
				//pildome("A");
				document.getElementById($('.A'+i).val()).disabled = true;
				AIsjungiam(a);
			}
			resetA();
			var b=0;
			while (i<15) {
				i++;
				b = Math.ceil(Math.random()*90);
				if (b<10) b="0"+b;
				while ( document.getElementById(b).disabled ) {
					b = Math.ceil(Math.random()*90);
					if (b<10) b="0"+b;
				}
				
				BCheck(b);
				$('.B'+i).val(b);
				//pildome("B");
				document.getElementById($('.B'+i).val()).disabled = true;
				BIsjungiam(B1, B2, B3, B4, B5, B6, B7, B8, B9);
			}
			resetB();
			var c=0;
			while (i<30) {
				i++;
				c = Math.ceil(Math.random()*90);
				if (c<10) c="0"+c;
				while ( document.getElementById(c).disabled ) {
					c = Math.ceil(Math.random()*90);
					if (c<10) c="0"+c;
				}
				
				CCheck(c);
				$('.C'+i).val(c);
				//pildome("C");
				document.getElementById($('.C'+i).val()).disabled = true;
				CIsjungiam(C1, C2, C3, C4, C5, C6, C7, C8, C9);
			}
			
		});
		
});
