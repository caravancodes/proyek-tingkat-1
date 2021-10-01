<?php 
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$ambil = $_GET['id_set_remedi'];
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/template.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/set_remed.css">
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
			SET REMEDI
			</div>
			<div class="isi">
				<div class="yeezy">
					<form action="" method="POST">
						<table class="form">
						<?php
							$sql_remedi = "SELECT * FROM set_remedi where id_set_remedi = '$ambil'";
							$query_remedi = oci_parse($conn, $sql_remedi);
							oci_execute($query_remedi);
							$r_remedi = oci_fetch_object($query_remedi);
						
						?>
							<tr>
								<td><span>Mata Pelajaran</span></td>
								<td><input type="text" name="matapelajaran" value="<?php echo $r_remedi->ID_MAPEL ?>"  disabled></td>
							</tr>
							<tr>
								<td><span>Jenis Ulangan</span></td>
								<td><input type="text" name="remedi" value="<?php echo $r_remedi->ID_REMEDI ?>" disabled></td>
							</tr>
							<tr>
								<td><span>Kelas</span></td>
								<td>
									<input type="radio" name="kelas" value="10" checked>10
									<input type="radio" name="kelas" value="11">11
									<input type="radio" name="kelas" value="12">12
								</td>
							</tr>
							<tr>
								<td><span>Waktu Mulai</span></td>
								<td class="jams"><input type="text" name="jam" value="<?php echo $r_remedi->JAM_MULAI ?>" > : <input type="text" name="menit" value="<?php echo $r_remedi->MENIT_MULAI ?>"></td>
							</tr>
							<tr>
								<td><span>Durasi Waktu</span></td>
								<td class="jams"><input type="text" name="durasi" value="<?php echo $r_remedi->DURASI ?>"> &nbsp Menit</td>
							</tr>
							<tr>
								<td><span>Tanggal</span></td>
								<td><input type="date" name="tanggal" value="<?php echo $r_remedi->TANGGAL ?>"></td>
							</tr>
							<tr>
								<td><span>Verfikasi</span></td>
								<td><input type="text" name="verifikasi" required value="<?php echo $r_remedi->KODE_REMEDI ?>"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type = "submit" name="oke" value="EDIT SET REMEDI">

								<?php
									if(isset($_POST['oke'])){
										$a_kelas = $_POST['kelas'];
										$a_jam = $_POST['jam'];
										$a_menit = $_POST['menit'];
										$a_durasi = $_POST['durasi'];
										$a_verifikasi = $_POST['verifikasi'];
										$a_tanggal = $_POST['tanggal'];
										$insert_set_remedi = oci_parse($conn, "UPDATE set_remedi SET kode_remedi='$a_verifikasi',kelas=$a_kelas, jam_mulai=$a_jam, menit_mulai =$a_menit, durasi=$a_durasi, tanggal='$a_tanggal' WHERE id_set_remedi = '$ambil'");
										oci_execute($insert_set_remedi);
										if ($insert_set_remedi == true) {
											echo"Berhasil Edit Set Remedi";
										} else {
											echo"Gagal Edit Set Remedi";
										}
									}
								?>
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div>
				</div>
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