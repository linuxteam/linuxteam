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
var id=0;
var max_num;
var names = new Array();
var end = false;


function start(){
	MakeRequest();
	setTimeout("flip()",5000);
}

function flip(){
	if(end) return;
	if(id == max_num ) id = 0;
	setTimeout("flip()",5000);
	document.getElementById("image").src = names[id];
	document.getElementById("button"+id).checked="yes";
	id++;
}


function MakeRequest(){
	var xmlHttp = getXMLHttp();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			HandleResponse(xmlHttp.responseText);
		}
	}
	xmlHttp.open("GET", "../../template/locate_images.php", true);
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

function goto(img_num){
	document.getElementById("image").src = names[img_num];
	stop_slideshow();
}

function stop_slideshow(){
	end = true;
}

function HandleResponse(response){
	names = response.split('<br>');
	max_num = names.length;
	var s="<form>";
	for(var i=0;i<max_num;i++){
		s+="<input id='button"+i+"' onclick=goto("+i+") type='radio' name='group'>"
	}
	document.getElementById('img_select').innerHTML = s+"</form>";
	document.getElementById("button"+(max_num-1)).checked="yes";
}


start();

