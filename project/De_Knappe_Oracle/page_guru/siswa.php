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
			LIST SISWA
			</div>
			<div class="isi">
				<div class="info-pilihan">
					<span>INFO PENTING</span>
					<ul>
						<li>Guru Dapat Menambahkan Data Siswa</li>
						<li>Guru Dapat Mengubah Data Siswa</li>
						<li>Guru Dapat Menghapus Data Siswa</li>
					</ul>
				</div>
				<div class="insert-data">
					<a href="list_siswa/tambah_siswa.php">Tambah Siswa</a><span>Klik ini untuk menambah data siswa</span>
				</div>

				<div class="yeezy">
					<table class="list">
					<tr>
						<th>NO.</th>
						<th>NIS</th>
						<th>NAMA</th>
						<th>KELAS</th>
						<th>JURUSAN</th>
						<th>GENDER</th>
						<th>ALAMAT</th>
						<th>NO TELP</th>
						<th colspan="2">ACTION</th>
					</tr>
					<?php

					while ($r_siswa = oci_fetch_object($query_siswa)) {
						echo'
						<tr>
						<td>'.$no++.'.</td>
						<td>'.$r_siswa->ID_SISWA.'</td>
						<td>'.$r_siswa->NAMA_SISWA.'</td>
						<td>'.$r_siswa->KELAS.'</td>
						<td>'.$r_siswa->JURUSAN.'</td>
						<td>'.$r_siswa->GENDER_SISWA.'</td>
						<td>'.$r_siswa->ALAMAT_SISWA.'</td>
						<td>'.$r_siswa->NO_TELP.'</td>
						<td class="edit"><a href="list_siswa/edit_siswa.php?id_siswa='.$r_siswa->ID_SISWA.'"><i class="flaticon-edit"></i></a></td>
						<td class="hapus"><a href="list_siswa/hapus_siswa.php?id_siswa='.$r_siswa->ID_SISWA.'"><i class="flaticon-garbage"></i></a></td>
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