var xmlHttp;
function showGaleri(str,id){
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null){
		alert("Tidak support request");
		return;
	}
	var url = "get_gambar.php?jumlah="+str+"&id="+id;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
}
function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("gal").innerHTML = xmlHttp.responseText;
	}
}
/* END OF OPTIONS*/

function showArt(st,idP){
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null){
		alert("Tidak support request");
		return;
	}
	xmlHttp.onreadystatechange = stateChangedP;
	xmlHttp.open("GET","get_artikel.php?jenis="+st+"&id="+idP,true);
	xmlHttp.send();
}
function stateChangedP(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("filterPost").innerHTML = xmlHttp.responseText;
	}
}
/* END OF OPTIONS*/

function showJml(x,idu){
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null){
		alert("Tidak support request");
		return;
	}
	xmlHttp.onreadystatechange = stateChangedJ;
	xmlHttp.open("GET","filter_artikel.php?jenis="+x+"&id="+idu,true);
	xmlHttp.send();
}
function stateChangedJ(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("filterJml").innerHTML = xmlHttp.responseText;
	}
}
/* END OF OPTIONS*/

function showArti(s,i,j){
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null){
		alert("Tidak support request");
		return;
	}
	xmlHttp.onreadystatechange = stateChangedP;
	xmlHttp.open("GET","jumlah_artikel.php?jumlah="+s+"&id="+i+"&jenis="+j,true);
	xmlHttp.send();
}
function stateChangedP(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("filterPost").innerHTML = xmlHttp.responseText;
	}
}
/* END OF OPTIONS*/


function GetXmlHttpObject(){
	var xmlHttp = null;
	try{
		xmlHttp = new XMLHttpRequest();
	}catch(e){
		try{
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}