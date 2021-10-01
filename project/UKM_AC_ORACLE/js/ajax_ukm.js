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

function pagination(angka,id){
	xHttp = test();
	xHttp.onreadystatechange=function(){
		if (xHttp.readyState==4){
			document.getElementById("gal").innerHTML = this.responseText;
		}
	}
	xHttp.open("GET","page_gambar.php?page="+angka+"&id="+id,true);
	xHttp.send();
}
pagination(0);

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