<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
	session_start();
	include ("koneksi.php");
	if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
		echo '<meta http-equiv="refresh" content="1">';
		header("location: ../login.php");
	}
	else{
		$cek=$_SESSION['user'];
		$qry = oci_parse($conn, "select * from user_admin where username='$cek'");
		oci_execute($qry);
        $data = oci_fetch_object($qry);
		$id=$_GET['NIM'];

		$query = oci_parse($conn, "select * from pengurus_ukm where nim='$id'");
		oci_execute($query);
        $row = oci_fetch_object($query);
?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Pengurus</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	<style>
        div.logo{
            background-color: white;
        }
    </style>
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">UKM - AC Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <i class="glyphicon glyphicon-time"></i> &nbsp; &nbsp; <?php echo date("D, j F Y"); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <div class="logo">
                        <img src="assets/img/Logo_ukm/<?php echo $data->LOGO_UKM; ?>" class="user-image img-responsive"/>
                    </div>
					</li>
				
					
                    <li >
                        <a ><i class="fa fa-upload fa-3x"></i> Upload <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li>
                                <a href="upload_artikel.php">Artikel</a>
                            </li>
                            <li>
                                <a href="upload_event.php">Event</a>
                            </li>
                            <li>
                                <a href="upload_galleri.php">Galleri / Dokumentasi</a>
                            </li>
							<li>
                                <a href="upload_pengurus.php">Pengurus UKM</a>
                            </li>
							<li>
                                <a href="upload_aboutukm.php">Tentang UKM</a>
                            </li>
                        </ul>
                    </li>				
					<li>
                        <a class="active-menu" href="view.php"><i class="fa fa-edit fa-3x"></i> Edit / Delete</a>
                    </li>
                  <li  >
                        <a href="setting.php"><i class="fa fa-cog fa-3x"></i> Setting</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Profil Pengurus UKM</h2>   
                        <h5>Welcome Admin <?php echo $data->NAMA_UKM; ?> , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Mahasiswa</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama" name="nama" value="<?php echo $row->NAMA_PENGURUS; ?>" />
                                        </div>
										<div class="form-group">
                                            <label>NIM</label>
                                            <input class="form-control" type="text" placeholder="Masukkan NIM" name="nim" value="<?php echo $row->NIM; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Foto</label>
                                            <input type="file" name="foto" />
											<input type="hidden" name="foto2" value="<?php echo $row->FOTO; ?>"/>
											<p class="help-block">Upload Foto Profil.</p>
                                        </div>
										<div class="form-group">
                                            <label>Jabatan</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Jabatan" name="jabatan" value="<?php echo $row->JABATAN; ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Biodata</label>
											<p class="help-block">Sedikit Biodata Mengenai Pengurus Tersebut.</p>
                                            <textarea class="form-control" name="bio" rows="5"><?php echo $row->BIO_PENGURUS; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Tempat Lahir" name="tempatLahir" value="<?php echo $row->TEMPAT_LAHIR; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" placeholder="yyyy-mm-dd" name="tgllahir" value="<?php echo $row->TGL_LAHIR; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
											<option value="<?php echo $row->JURUSAN; ?>"><?php echo $row->JURUSAN; ?></option>
                                                <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
                                                <option value="S1 Teknik Telekomunikasi">S1 Teknik Telekomunikasi</option>
                                                <option value="S1 Teknik Fisika">S1 Teknik Fisika</option>
                                                <option value="S1 Sistem Komputer">S1 Sistem Komputer</option>
                                                <option value="S1 Teknik Industri">S1 Teknik Industri</option>
                                                <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                                                <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
                                                <option value="S1 Ilmu Komputasi">S1 Ilmu Komputasi</option>
                                                <option value="S1 Teknologi Informasi">S1 Teknologi Informasi</option>
                                                <option value="S1 Manajemen (MBTI)">S1 Manajemen (MBTI)</option>
                                                <option value="S1 Akuntansi">S1 Akuntansi</option>
                                                <option value="S1 Ilmu Komunikasi">S1 Ilmu Komunikasi</option>
                                                <option value="S1 Ilmu Administrasi Bisnis">S1 Ilmu Administrasi Bisnis</option>
                                                <option value="S1 Hubungan Masyarakat">S1 Hubungan Masyarakat</option>
                                                <option value="S1 Desain Komunikasi Visual">S1 Desain Komunikasi Visual</option>
                                                <option value="S1 Desain Produk">S1 Desain Produk</option>
                                                <option value="S1 Seni Rupa Murni">S1 Seni Rupa Murni</option>
                                                <option value="S1 Desain Interior">S1 Desain Interior</option>
                                                <option value="S1 Kriya Tekstil dan Mode">S1 Kriya Tekstil dan Mode</option>
                                                <option value="D4 Sistem Multimedia">D4 Sistem Multimedia</option>
                                                <option value="D3 Komputerisasi Akuntansi">D3 Komputerisasi Akuntansi</option>
                                                <option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
                                                <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                                                <option value="D3 Manajemen Pemasaran">D3 Manajemen Pemasaran</option>
                                                <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                                <option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
                                                <option value="D3 Perhotelan">D3 Perhotelan</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Angkatan</label>
                                            <select class="form-control" name="angkatan" >
                                                <option value="<?php echo $row->ANGKATAN; ?>"><?php echo $row->ANGKATAN; ?></option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jk" >
                                                <option value="<?php echo $row->JENIS_KELAMIN; ?>"><?php echo $row->JENIS_KELAMIN; ?></option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
										
                                        <button type="submit" name="upload" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>

                                    </form>
                                </div>
<?php
	include ("koneksi.php");
	if(isset($_POST['upload'])){
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$jabatan = $_POST['jabatan'];
		$bio = $_POST['bio'];
		$biot = nl2br($bio);
		$tempat = $_POST['tempatLahir'];
		$tgl = $_POST['tgllahir'];
		$jurusan = $_POST['jurusan'];
		$angkatan = $_POST['angkatan'];
		$jk = $_POST['jk'];
		$foto = $_POST['foto2'];
		
		$nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $tipe_file = $_FILES['foto']['type'];
        $tmp_file = $_FILES['foto']['tmp_name'];
				
        $waktu = date('His');
        $nama_file_baru = $waktu.$nama_file;
        $path = "assets/img/Profil_user/".$nama_file_baru;
		
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
			if($ukuran_file <= 2000000){
				move_uploaded_file($tmp_file, $path);
             
				$sql = "UPDATE pengurus_ukm SET nim='$nim', foto='$nama_file_baru', nama_pengurus='$nama', jabatan='$jabatan', bio_pengurus='$biot', 
						tempat_lahir='$tempat', tgl_lahir='$tgl', jurusan='$jurusan', angkatan='$angkatan', jenis_kelamin='$jk' WHERE nim='$id'";
				$update = oci_parse($conn, $sql);
                oci_execute($update);
				if($update==true){
					echo "<font color='blue'>Data berhasil diupdate</font>";
				} else {
					echo "<font color='red'>Gagal update data!</font>";
                }
            } else {
				echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
            }
        } else {
			$sql = "UPDATE pengurus_ukm SET nim='$nim', foto='$foto', nama_pengurus='$nama', jabatan='$jabatan', bio_pengurus='$biot', 
						tempat_lahir='$tempat', tgl_lahir='$tgl', jurusan='$jurusan', angkatan='$angkatan', jenis_kelamin='$jk' WHERE nim='$id'";
				$update = oci_parse($conn, $sql);
                oci_execute($update);
				if($update==true){
					echo "<font color='blue'>Data berhasil diupdate</font>";
				} else {
					echo "<font color='red'>Gagal update data!</font>";
                }
        }
    }
?>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php
}
?>