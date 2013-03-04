/*
	Linuxteam teilam Site
    Copyright (C) 2012-2013  Linuxteam teilam

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
*/
var names = new Array();
var len=0
var tier=0;
var meg=10;
MakeRequest();

function MakeRequest(){
	var url = window.location.href;
	var asd = url.split('?id=');
	var xmlHttp = getXMLHttp();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			HandleResponse(xmlHttp.responseText);
		}
	}
	
	xmlHttp.open("GET", "/content/a.php?id="+asd[1], true);
	xmlHttp.send(null);
}

function getXMLHttp(){
	var xmlHttp
	try{//Firefox, Opera 8.0+, Safari
		xmlHttp = new XMLHttpRequest();
	}catch(e){
		try{//Internet Explorer
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
	return xmlHttp;
}

function HandleResponse(response){
	names = response.split('<br>');
	len = names.length;
	show();
}

function show(){
	var st = "<button id='left_button' onclick=\"dec()\">&lt</button><button id='right_button' onclick=\"inc()\">&gt</button>";
	var s="";
	for(var i=0;(i<len)&&(i<meg);i++){
		s+= "<a href="+names[(tier*meg)+i]+"><img src="+names[(tier*meg)+i]+"></img></a>";
	}
	if(names[0].length == 0) document.getElementById("mini_pics").style.minHeight="0";
	document.getElementById("mini_pics").innerHTML = (((len != 0)&&(len > meg))? st:"")+"<div id='inner_div'>"+s+"</div>";
}


function inc(){
	tier++;
	if(tier*meg > len) tier=0;
	show();
}

function dec(){
	tier--;
	if(tier<0) tier=Math.floor(len/meg);
	show();
}
