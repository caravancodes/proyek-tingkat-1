<?php
	$severname = "localhost/XE"; //Servername
	$user = ""; // user dalam oracle
	$pass = ""; // pass dalam oracle
	$conn = oci_connect ("$user","$pass","$severname");
	if(!$conn){
		echo '<script>alert("Gagal Connect Database"); </script>';
	}
?>