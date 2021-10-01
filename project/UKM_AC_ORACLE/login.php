<?php
session_start();
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<style>
			header{
				height: 100px;
				background-color: ##1abc9c;
			}
			div.garis{
				border-bottom: 5px solid #0e7886;
				height: 90%;
			}
			div.logo{
				margin: -100px 0px;
			}
			div.logo img{
				width: 13%;
				height: auto;
			}
			body{
				background-color: #0b5d68;
				margin: 0;
				padding: 0;
			}
			p, h2{
				font-family: Arial;
				color: #0e7886;
			}
			div.kotak{
				border: 10px solid #0e7886;
				background-color: #5dddd3;
				width: 40%;
				margin: 12%;
			}
			table {
				width: 80%;
			}
			input[type=text], input[type=password] {
				text-align: center;
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type=submit] {
				width: 50%;
				background-color: #0e7886;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				font-size: 17px;
			}

			input[type=submit]:hover {
				background-color: #0b5d68;
			}
		</style>
	</head>
	<body>
		<header>
			<div class="garis">
			</div>
		</header>
		<center>
			<div class="logo">
			<a href="index.php">
				<img src="logo.png"/>
			</a>
			</div>
		</center>
		<center>
			<div class="kotak">
				<h2><b>UKM AC - LOGIN</b></h2>
				<table>
				<form action="" method="POST">
					<tr>
						<td><input type="text" name="username" placeholder="--Username--"/></td>
					</tr>
					<tr>
						<td><input type="Password" name="password" placeholder="--Password--"/></td>
					</tr>
					<tr>
						<td><center><input type="submit" value="Login" name="login"/></center></td>
					</tr>
				</form>
<?php
if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass = md5($password);
	
	$query = oci_parse($conn, "select * from user_admin where username = '$username' and password = '$pass'");
	oci_execute($query);
	if(!$query){
		echo"GAGAL ROW";
	}
	
	if(oci_num_rows($query) == 1) {
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		header('location:adminukm/upload_artikel.php');
		
	} else {
		header('location:login.php');
	}
}
?>
				</table>
			</div>
		</center>
	</body>
</html>