<?php


function check1(){
	$string1 = "a";
	if ($string1=="a"){
		return true;
	}
}

function check2(){
	$string2 = "b";
	if ($string2=="b"){
		return true;
	}
}
function check3(){
	$string3 = "c";
	if ($string3=="c"){
		return true;
	}
}

function top(){
	if (check1()=== true && check2()==true && check3()===true){
		return "YAHOOO";
	}else{
		return ":(";
	}
}

echo top();