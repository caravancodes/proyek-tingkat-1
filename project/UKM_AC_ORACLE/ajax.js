var xmlHttp;
function showHint(str) {  //function dari onkeyup dimana str = inputan dari input text
	if (str.length == 0) {  //pertama, cek apakah field str kosong (str.length == 0)
		document.getElementById("txtHint").innerHTML = "";  //hapus konten dari element dengan id "txtHint", lalu exit function
		return;
	} else {
		xmlHttp = GetXmlHttpObject();  //pembuatan sebuah objek XMLHttpRequest
		xmlHttp.onreadystatechange = stateTyped;
		var url = "get_hint.php?q="+str;
		xmlHttp.onreadystatechange = stateTyped;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function stateTyped(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
	}
}
/*END OF SEARCH*/

function showPost(s) {
	if (s.length == 0) {
		document.getElementById("cariArt").innerHTML = ""; 
		return;
	} else {
		xmlHttp = GetXmlHttpObject();  //pembuatan sebuah objek XMLHttpRequest
		xmlHttp.onreadystatechange = stateTypedC;
		var ur = "get_post.php?q="+s;
		xmlHttp.onreadystatechange = stateTypedC;
		xmlHttp.open("GET",ur,true);
		xmlHttp.send(null);
	}
}
function stateTypedC(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("cariArt").innerHTML = xmlHttp.responseText;
	}
}
/*END OF SEARCH ARTIKEL*/

function showHasil(st) {
	if (st.length == 0) {
		document.getElementById("hasil").innerHTML = "";
		return;
	} else {
		xmlHttp = GetXmlHttpObject();  //pembuatan sebuah objek XMLHttpRequest
		xmlHttp.onreadystatechange = stateTypedB;
		var u = "get_hasilpost.php?q="+st;
		xmlHttp.onreadystatechange = stateTypedB;
		xmlHttp.open("GET",u,true);
		xmlHttp.send(null);
	}
}
function stateTypedB(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("hasil").innerHTML = xmlHttp.responseText;
	}
}
/*END OF SEARCH ARTIKEL*/

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