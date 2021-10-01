<?php 
	session_start();
		include ('../php/connect.php');
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		include ('body_part/query_content.php');
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/template.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/view_guru.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/font/flaticon.css">
		<link rel="icon" href="/De_Knappe/images/logo.png">
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li><a href="../php/logout_guru.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="profil_guru.php"><?php echo $data->NAMA_GURU; ?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<?php require_once('body_part/sidebar.php') ?>
		<div class="content">	
			<div class="gambar">
			</div>
			<div class="isijudul">
			SET REMEDI
			</div>
			<div class="isi">
				<div class="info-pilihan">
					<span>INFO PENTING</span>
					<ul>
						<li>Input Durasi Untuk Waktu Pengerjaan Remedi</li>
						<li>Kode Remedi di gunakan agar siswa tidak sembarangan menekan tombol mulai remedi</li>
						<li>Guru Merencanakan Remedi Untuk Siswa</li>
					</ul>
				</div>
				<div class="insert-data">
					<a href="set_remedi/tambah_set_remedi.php">Set Remedi</a><span>Klik ini untuk menambah menset remedi</span>
				</div>				
				<div class="yeezy">
					<table class="list">
						<tr>
							<th>NO.</th>
							<th>KODE REMEDI</th>
							<th>MAPEL</th>
							<th>JENIS REMEDI</th>
							<th>KELAS</th>
							<th>WAKTU MULAI</th>
							<th>DURASI</th>
							<th>TANGGAL</th>
							<th colspan="2">ACTION</th>
						</tr>
						
						<?php
						while ($r_set_remedi = oci_fetch_object($query_remedi)) {
							echo'
						<tr>
							<td>'.$no++.'.</td>
							<td>'.$r_set_remedi->KODE_REMEDI.'</td>
							<td>'.$r_set_remedi->ID_MAPEL.'</td>
							<td>'.$r_set_remedi->ID_REMEDI.'</td>
							<td>'.$r_set_remedi->KELAS.'</td>
							<td>'.$r_set_remedi->JAM_MULAI. ' : '.$r_set_remedi->MENIT_MULAI.'</td>
							<td>'.$r_set_remedi->DURASI.' Menit</td>
							<td>'.$r_set_remedi->TANGGAL.'</td>
							<td class="edit"><a href="set_remedi/edit_set_remedi.php?id_set_remedi='.$r_set_remedi->ID_SET_REMEDI.'"><i class="flaticon-edit"></i></a></td>
							<td class="hapus"><a href="set_remedi/hapus_set_remedi.php?id_set_remedi='.$r_set_remedi->ID_SET_REMEDI.'"><i class="flaticon-garbage"></i></a></td>
						</tr>
						';
						}
						?>
					</table>
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
  		header("location: ../login_guru.php");
	}
?>