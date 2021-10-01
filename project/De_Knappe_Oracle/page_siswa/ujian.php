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
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/ujian_siswa.css">
		<link rel="stylesheet" type="text/css" href="/De_Knappe/css/font/flaticon.css">
		<script src="remedi_part/js/jQuery.js" type="text/javascript"></script>
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
				<center>Remedi</center>
				</div>
				<div class="output-soal">
                    <div class="out">
						<?php
						if (isset($_POST['mulai'])){
						$remedi = $_POST['remedi'];
						$mapel = $_POST['mapel'];
						$kelas = $_POST['kelas'];
						$kode = $_POST['kode'];
						$sql_setremed = "SELECT * FROM set_remedi join remedi on (set_remedi.ID_REMEDI=remedi.ID_REMEDI) join mapel on (set_remedi.ID_MAPEL=mapel.ID_MAPEL) where kode_remedi='$kode' and set_remedi.ID_REMEDI='$remedi' and set_remedi.ID_MAPEL = '$mapel' and KELAS=$kelas ";
						$cek_set = oci_parse($conn, $sql_setremed);
						oci_execute($cek_set);						
						if ($tarik = oci_fetch_object($cek_set)) {
							$sql_soal = "SELECT * FROM soal join remedi on (soal.ID_REMEDI=remedi.ID_REMEDI) join mapel on (soal.ID_MAPEL=mapel.ID_MAPEL) where soal.ID_REMEDI='$remedi' AND soal.ID_MAPEL='$mapel' AND KELAS='$kelas'";
							$query_soal = oci_parse($conn, $sql_soal);
							oci_execute($query_soal);
							$jumlah = oci_num_rows($query_soal);
							$no = 1;
							$jam = $tarik->DURASI / 60;
							$jams = explode('.',$jam);
							$menits = $tarik->DURASI % 60; 
								?>
						<div class="soal">
							<div class="countdown">
								<table>
									<tr>
										<th><span>Remedi</span></th>
										<th><span>: &nbsp <?php echo $tarik->REMEDI?></span></th>
										<td rowspan="3">
											<center>
											<div id="timer">
												<?php require_once('body_part/timer_ujian.php') ?>
											</div>
											</center>
										</td>
									</tr>
									<tr>
										<th><span>Mata Pelajaran</span></th>
										<th><span>: &nbsp <?php echo $tarik->NAMA_MAPEL?></span></th>
									</tr>
									<tr>
										<th><span>Kelas</span></th>
										<th><span>: &nbsp <?php echo $tarik->KELAS?></span></th>
									</tr>
								</table>
							</div>
								<form action="jawaban.php" method="POST">
								<?php
									while ($row = oci_fetch_object($query_soal)) {
									$id = $row->NO_SOAL;
									$soal = $row->SOAL;
									$a = $row->PIL_A;
									$b = $row->PIL_B;
									$c = $row->PIL_C;
									$d = $row->PIL_D;
									echo'
									<input type="hidden" name="id[]" value="'.$id.'">
									<input type="hidden" name="jumlah" value="'.$jumlah.'">
									<input type="hidden" name="t_remedi" value="'.$remedi.'">
									<input type="hidden" name="t_mapel" value="'.$mapel.'">
									<input type="hidden" name="t_kelas" value="'.$kelas.'">
									<div class="ini-soal">
										<table>
											<tr>
												<td>'.$no++.'.</td>
												<td>'.$soal.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="a">'.$a.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="b">'.$b.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="c">'.$c.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="d">'.$d.'</td>
											</tr>
										</table> 
									</div>                     
									';
									}
								?>
									<div class="submit">
										<input type="submit" name="oke" value="FINISH">
									</div>
								</form>
							</div>
							<?php
                    } else {
						echo "<center><span style='color:red; font-size:23px'><i>ANDA TIDAK BISA MENGIKUTI REMEDI INI</i></span>
							<br><br><span>Hubungi Guru Anda Untuk Melakukan Remedi</span></center>";
					}

					}	
				?>
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