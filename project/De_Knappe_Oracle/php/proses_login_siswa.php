<?php
if (isset($_POST['login'])) {
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$sql = "SELECT * FROM siswa where id_siswa = '$username' and password = '$password'";
	$parse = oci_parse($conn, $sql);
	oci_execute ($parse);
	$row = oci_fetch_object($parse);
	if($row==true) {
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		header('location:page_siswa/home.php');
	} else {
		echo 'Username atau Password Salah';	
	}
}
?> 