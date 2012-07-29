

function AIsjungiam(numberz)
{
if ((numberz >= 01) && (numberz <= 10)){ return $("#01,#02,#03,#04,#05,#06,#07,#08,#09,#10").attr("disabled", "disabled"); }
if ((numberz >= 11) && (numberz <= 20)){ return $("#11,#12,#13,#14,#15,#16,#17,#18,#19,#20").attr("disabled", "disabled"); }
if ((numberz >= 21) && (numberz <= 30)){ return $("#21,#22,#23,#24,#25,#26,#27,#28,#29,#30").attr("disabled", "disabled"); }			
if ((numberz >= 31) && (numberz <= 40)){ return $("#31,#32,#33,#34,#35,#36,#37,#38,#39,#40").attr("disabled", "disabled"); }
if ((numberz >= 41) && (numberz <= 50)){ return $("#41,#42,#43,#44,#45,#46,#47,#48,#49,#50").attr("disabled", "disabled"); }	
if ((numberz >= 51) && (numberz <= 60)){ return $("#51,#52,#53,#54,#55,#56,#57,#58,#59,#60").attr("disabled", "disabled"); }			
if ((numberz >= 61) && (numberz <= 70)){ return $("#61,#62,#63,#64,#65,#66,#67,#68,#69,#70").attr("disabled", "disabled"); }
if ((numberz >= 71) && (numberz <= 80)){ return $("#71,#72,#73,#74,#75,#76,#77,#78,#79,#80").attr("disabled", "disabled"); }
if ((numberz >= 81) && (numberz <= 90)){ return $("#81,#82,#83,#84,#85,#86,#87,#88,#89,#90").attr("disabled", "disabled"); }
}

function BCheck(numberz)
{
if ((numberz >= 01) && (numberz <= 10)){ return B1++; }
else if ((numberz >= 11) && (numberz <= 20)){ return B2++; }
else if ((numberz >= 21) && (numberz <= 30)){ return B3++; }			
else if ((numberz >= 31) && (numberz <= 40)){ return B4++; }
else if ((numberz >= 41) && (numberz <= 50)){ return B5++; }	
else if ((numberz >= 51) && (numberz <= 60)){ return B6++; }			
else if ((numberz >= 61) && (numberz <= 70)){ return B7++; }
else if ((numberz >= 71) && (numberz <= 80)){ return B8++; }
else if ((numberz >= 81) && (numberz <= 90)){ return B9++; }
}

function BIsjungiam(B1, B2, B3, B4, B5, B6, B7, B8, B9)
{
if (B1 == 2){ $("#01,#02,#03,#04,#05,#06,#07,#08,#09,#10").attr("disabled", "disabled"); }
if (B2 == 2){ $("#11,#12,#13,#14,#15,#16,#17,#18,#19,#20").attr("disabled", "disabled"); }
if (B3 == 2){ $("#21,#22,#23,#24,#25,#26,#27,#28,#29,#30").attr("disabled", "disabled"); }			
if (B4 == 2){ $("#31,#32,#33,#34,#35,#36,#37,#38,#39,#40").attr("disabled", "disabled"); }
if (B5 == 2){ $("#41,#42,#43,#44,#45,#46,#47,#48,#49,#50").attr("disabled", "disabled"); }	
if (B6 == 2){ $("#51,#52,#53,#54,#55,#56,#57,#58,#59,#60").attr("disabled", "disabled"); }			
if (B7 == 2){ $("#61,#62,#63,#64,#65,#66,#67,#68,#69,#70").attr("disabled", "disabled"); }
if (B8 == 2){ $("#71,#72,#73,#74,#75,#76,#77,#78,#79,#80").attr("disabled", "disabled"); }
if (B9 == 2){ $("#81,#82,#83,#84,#85,#86,#87,#88,#89,#90").attr("disabled", "disabled"); }
}
function CCheck(numberz)
{
if ((numberz >= 01) && (numberz <= 10)){ return C1++; }
if ((numberz >= 11) && (numberz <= 20)){ return C2++; }
if ((numberz >= 21) && (numberz <= 30)){ return C3++; }			
if ((numberz >= 31) && (numberz <= 40)){ return C4++; }
if ((numberz >= 41) && (numberz <= 50)){ return C5++; }	
if ((numberz >= 51) && (numberz <= 60)){ return C6++; }			
if ((numberz >= 61) && (numberz <= 70)){ return C7++; }
if ((numberz >= 71) && (numberz <= 80)){ return C8++; }
if ((numberz >= 81) && (numberz <= 90)){ return C9++; }

}

function CIsjungiam(C1, C2, C3, C4, C5, C6, C7, C8, C9)
{
if (C1 == 3){ $("#01,#02,#03,#04,#05,#06,#07,#08,#09,#10").attr("disabled", "disabled"); }
if (C2 == 3){ $("#11,#12,#13,#14,#15,#16,#17,#18,#19,#20").attr("disabled", "disabled"); }
if (C3 == 3){ $("#21,#22,#23,#24,#25,#26,#27,#28,#29,#30").attr("disabled", "disabled"); }		
if (C4 == 3){ $("#31,#32,#33,#34,#35,#36,#37,#38,#39,#40").attr("disabled", "disabled"); }
if (C5 == 3){ $("#41,#42,#43,#44,#45,#46,#47,#48,#49,#50").attr("disabled", "disabled"); }
if (C6 == 3){ $("#51,#52,#53,#54,#55,#56,#57,#58,#59,#60").attr("disabled", "disabled"); }		
if (C7 == 3){ $("#61,#62,#63,#64,#65,#66,#67,#68,#69,#70").attr("disabled", "disabled"); }
if (C8 == 3){ $("#71,#72,#73,#74,#75,#76,#77,#78,#79,#80").attr("disabled", "disabled"); }
if (C9 == 3){ $("#81,#82,#83,#84,#85,#86,#87,#88,#89,#90").attr("disabled", "disabled"); }

}
function resetA()
{
$("#01,#02,#03,#04,#05,#06,#07,#08,#09,#10,#11,#12,#13,#14,#15,#16,#17,#18,#19,#20,#21,#22,#23,#24,#25,#26,#27,#28,#29,#30,#31,#32,#33,#34,#35,#36,#37,#38,#39,#40,#41,#42,#43,#44,#45,#46,#47,#48,#49,#50,#51,#52,#53,#54,#55,#56,#57,#58,#59,#60,#61,#62,#63,#64,#65,#66,#67,#68,#69,#70,#71,#72,#73,#74,#75,#76,#77,#78,#79,#80,#81,#82,#83,#84,#85,#86,#87,#88,#89,#90").removeAttr("disabled");
while (k<=5){ document.getElementById($('.A'+k).val()).disabled = true; k++; }
}
function resetB()
{
$("#01,#02,#03,#04,#05,#06,#07,#08,#09,#10,#11,#12,#13,#14,#15,#16,#17,#18,#19,#20,#21,#22,#23,#24,#25,#26,#27,#28,#29,#30,#31,#32,#33,#34,#35,#36,#37,#38,#39,#40,#41,#42,#43,#44,#45,#46,#47,#48,#49,#50,#51,#52,#53,#54,#55,#56,#57,#58,#59,#60,#61,#62,#63,#64,#65,#66,#67,#68,#69,#70,#71,#72,#73,#74,#75,#76,#77,#78,#79,#80,#81,#82,#83,#84,#85,#86,#87,#88,#89,#90").removeAttr("disabled");
k= k-5;
var m = 6;
while (k <= 5){ document.getElementById($('.A'+k).val()).disabled = true; k++; }
while (m <= 15){ document.getElementById($('.B'+m).val()).disabled = true; m++; }
}
function resetAll()
{
	$("#01,#02,#03,#04,#05,#06,#07,#08,#09,#10,#11,#12,#13,#14,#15,#16,#17,#18,#19,#20,#21,#22,#23,#24,#25,#26,#27,#28,#29,#30,#31,#32,#33,#34,#35,#36,#37,#38,#39,#40,#41,#42,#43,#44,#45,#46,#47,#48,#49,#50,#51,#52,#53,#54,#55,#56,#57,#58,#59,#60,#61,#62,#63,#64,#65,#66,#67,#68,#69,#70,#71,#72,#73,#74,#75,#76,#77,#78,#79,#80,#81,#82,#83,#84,#85,#86,#87,#88,#89,#90").removeAttr("disabled");
	var a = 1;
	var b = 6;
	var c = 16;
	while (a <= 5){ $('.A'+a).val(""); a++; }
	while (b <= 15){ $('.B'+b).val(""); b++; }
	while (c <= 30){ $('.C'+c).val(""); c++; }
}