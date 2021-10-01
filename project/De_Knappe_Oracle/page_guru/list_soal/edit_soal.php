<?php 
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$cek_noSoal = $_GET['no_soal'];
		$sql_soal = "SELECT * FROM soal where no_soal = $cek_noSoal";
		$query_soal = oci_parse($conn, $sql_soal);
		oci_execute($query_soal);
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/template.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/add.css">
        <link rel="stylesheet" type="text/css" href="/De_Knappe/css/font/flaticon.css">
		<link rel="icon" href="/De_Knappe/images/logo.png">
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li><a href="../../php/logout_guru.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="../profil_guru.php"><?php echo $data->NAMA_GURU; ?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<?php require_once('../body_part/sidebar_edit.php') ?>
		<div class="content">	
			<div class="gambar">
			</div>
			<div class="isijudul">
			UBAH SOAL
			</div>
			<div class="isi">
           
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
                <?php

                while ($r_soal = oci_fetch_object($query_soal)) {
                ?>
                    <tr>
                        <td><span>Soal</span></td>
                        <td><input type="text" name="soal" required value="<?php echo $r_soal->SOAL ?>"></td>            
                    </tr>
                    <tr>
                        <td><span>Jawaban Benar</span></td>
                        <td>
                        <input type="radio" name="jawaban" value="a" checked>A
                        <input type="radio" name="jawaban" value="b">B
                        <input type="radio" name="jawaban" value="c">C
                        <input type="radio" name="jawaban" value="d">D
                        </td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan A</span></td>
                        <td><input type="text" name="a" required value="<?php echo $r_soal->PIL_A ?>"></td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan B</span></td>
                        <td><input type="text" name="b" required value="<?php echo $r_soal->PIL_B ?>"></td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan C</span></td>
                        <td><input type="text" name="c" required value="<?php echo $r_soal->PIL_C ?>"></td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan D</span></td>
                        <td><input type="text" name="d" required value="<?php echo $r_soal->PIL_D ?>"></td>            
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="tombol" name="upload" value="UBAH SOAL">
							<?php
							if(isset($_POST['upload'])) {
							$soal = $_POST['soal'];
							$jawaban = $_POST['jawaban'];
							$pil_a = $_POST['a'];
							$pil_b = $_POST['b'];
							$pil_c = $_POST['c'];
							$pil_d = $_POST['d'];

							$sql_update_soal = "UPDATE soal SET soal = '$soal', jawaban = '$jawaban', pil_a = '$pil_a', pil_b = '$pil_b', pil_c = '$pil_c', pil_d = '$pil_d' where no_soal ='$cek_noSoal'";
							$update_soal = oci_parse($conn, $sql_update_soal);
							oci_execute($update_soal);
								if($update_soal) {
									echo 'Soal Berhasil di Ubah';
								} else {
									echo 'Gagal ubah soal!';
								}
							}
							?>						
						</td>
                    </tr>
				</table>
                <?php
                }
                ?>				
				</form>
			</div>
		</div>
		<footer>
			<div class="footer">
			Copyright &copy; De-Knappe [ Remedial Online Sistem ] 2017<br> 
			All rights reserved Telkom University - D3 Teknik Informatika<br>
			</div>
		</footer>
	</body>
</html>
<?php
}
	else
	{
  		header("location: ../login_guru.php");
	}
?>