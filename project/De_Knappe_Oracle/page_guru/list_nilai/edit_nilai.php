<?php 
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$ambil = $_GET['id_nilai'];
		$sql_nis = "SELECT * FROM nilai join remedi on nilai.id_remedi = remedi.id_remedi where id_nilai=$ambil";
		$query_nis = oci_parse($conn, $sql_nis);
		oci_execute($query_nis);
		$r_nis = oci_fetch_object($query_nis);
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
			UBAH NILAI
			</div>
			<div class="isi">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<td><span>ID Siswa</span></td>
						<td><input type="text" name="id_siswa" value="<?php echo $r_nis->ID_SISWA ?>" disabled></td>
					</tr>
					<tr>
						<td><span>Mata Pelajaran</span></td>
						<td>
							<?php
                            $cekmapel = $data->NAMA_MAPEL;
                            echo'<input type="text" name="id_mapel" value="'.$cekmapel.'"  disabled>';
                            ?>
						</td>
					</tr>
					<tr>
						<td><span>Remedi</span></td>
						<td><input type="text" name="id_siswa" value="<?php echo $r_nis->REMEDI ?>" disabled></td>
					</tr>
					<tr>
						<td><span>Nilai</span></td>
						<td><input type="text" name="nilai" value="<?php echo $r_nis->NILAI ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="oke" value="UBAH NILAI">
						<?php
							if(isset($_POST['oke'])){
								$n_nilai = $_POST['nilai'];
								$sql_update_nilai = "UPDATE nilai SET nilai='$n_nilai' WHERE id_nilai = $ambil";
								$update_nilai = oci_parse($conn, $sql_update_nilai);
								oci_execute($update_nilai);
								if ($update_nilai==true) {
									echo 'Nilai Berhasil Di Ubah';
								} else {
									echo 'Gagal ubah data nilai!';
								}
							}
						?>
						</td>
					</tr>
				</table>				
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
  		header("location: ../../login_guru.php");
	}
?>