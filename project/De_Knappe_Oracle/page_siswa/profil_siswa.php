<?php 
	session_start();
		include ('../php/connect.php');
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/body_siswa.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/profil_siswa.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/font/flaticon.css">
		<link rel="icon" href="/De_Knappe/images/logo.png">
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li class="keluar"><a href="../php/logout_siswa.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="profil_siswa.php"><?php echo $data->NAMA_SISWA ?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<div class="content">
			<div class="samping">
				<div class="dkp">
					<img src="../images/pict1.png">
				</div>
				<div class="sidebar">
					<div>
						<ul>
							<li><a href="home.php"><i class="flaticon-home"></i> &nbsp Home</a></li>
							<li><a href="profil_siswa.php"><i class="flaticon-user"></i> &nbsp Profil Siswa</a></li>
							<li><a href="remedi.php"><i class="flaticon-edit"></i> &nbsp Mulai Remedi</a></li>
							<li><a href="nilai.php"><i class="flaticon-list-1"></i> &nbsp Nilai Siswa</a></li>
						</ul>
					</div>
				</div>
				<div class="twh">
					<?php require_once('body_part/sidebar.php') ?>
				</div>
			</div>
			<div class="isi">
				<div class="judul">
				<center>Profil Siswa</center>
				</div>
				<div class="set-profil">
					<div class="profil_siswa">
						<?php echo'<img src="../images/foto_siswa/'.$data->FOTO_SISWA.'">'?>
						<div class="underfoto">
							<?php echo $data->NAMA_SISWA ; ?>
						</div>
						<table>
							<tr>
								<td>Nama &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->NAMA_SISWA  ?></td>
							</tr>
							<tr>
								<td>Id Siswa &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->ID_SISWA ?></td>
							</tr>
							<tr>
								<td>Kelas &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->KELAS . ' ' . $data->JURUSAN ?></td>
							</tr>
							<tr>
								<td>Tempat, Tanggal Lahir &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->TEMPAT_LAHIR . ', ' . $data->TANGGAL_LAHIR ?></td>
							</tr>
							<tr>
								<td>Alamat &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->ALAMAT_SISWA ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->GENDER_SISWA ?></td>
							</tr>
							<tr>
								<td>No. Telepon &nbsp;&nbsp;  </td>
								<td>: <?php echo $data->NO_TELP ?></td>
							</tr>
						</table>
						<div class="edit">
							<a href="update_profil.php">UBAH PROFIL</a>
						</div>
					</div>

					<div class="penjelasan">
						<table>
							<tr>
								<th>Ubah Profil</th>
								<td>Menu ini untuk mengubah profil siswa</td>
							</tr>
							<tr>
								<th></th>
								<td>Id Siswa tidak dapat di rubah</td>
							</tr>
							<tr>
								<th></th>
								<td>Kelas dan jurusan tidak dapat di rubah</td>
							</tr>
						</table>
						<img src="../images/Profil.png">
					</div>

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
  		header("location: ../index.php");
	}
?>