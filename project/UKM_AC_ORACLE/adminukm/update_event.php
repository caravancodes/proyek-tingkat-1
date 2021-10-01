<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
	session_start();
	include ("koneksi.php");
	if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
		echo '<meta http-equiv="refresh" content="1">';
		header("location: ../login.php");
	} else {
		$cek=$_SESSION['user'];
		$qry = oci_parse($conn, "select * from user_admin where username='$cek'");
		oci_execute($qry);
        $data = oci_fetch_object($qry);
		$id=$_GET['ID_POSTING'];
	
		$query = oci_parse($conn, "select * from posting where id_posting = '$id'");
		oci_execute($query);
        $row = oci_fetch_object($query);
		
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Event</title>
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
                     <h2>Edit Event</h2>   
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
                                    <form role="form" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Event</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama Event" name="event" value="<?php echo $row->JUDUL; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Gambar</label>
                                            <input type="file" name="poster"/>
											<p class="help-block">Upload Poster Event.<br>Tipe file harus : jpeg/jpg/png</p>
                                            <input type="hidden" name="poster2" value="<?php echo $row->GAMBAR_POSTING; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Event</label>
                                            <textarea class="form-control" name="deskEvent" rows="10"><?php echo $row->ISI; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pelaksanaan</label>
                                            <input class="form-control" type="date" placeholder="yyyy-mm-dd" name="tgl" value="<?php echo $row->TGL_EVENT; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Tempat Pelaksanaan</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Alamat Lokasi" name="tempat" value="<?php echo $row->TEMPAT; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Waktu Pelaksanaan</label>
                                            <input class="form-control" type="time" placeholder="hh:mm (01:00 s/d 24:00)" name="waktu" value="<?php echo $row->WAKTU; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Info Lain</label>
                                            <input class="form-control" type="text" placeholder="dresscode/harga tiket/lainnya" name="info" value="<?php echo $row->INFO_LAIN; ?>"/>
											<p class="help-block">Info dresscode/harga tiket/lainnya.</p>
                                        </div>
										
                                        <button type="submit" name="upload" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>

                                    </form>
                                </div>
<?php
	include ("koneksi.php");
	if(isset($_POST['upload'])){
		$judul = $_POST['event'];
		$isi = $_POST['deskEvent'];
		$isi2 = nl2br($isi);
		$tgl_up = date("Y-m-d");
		$tglH = $_POST['tgl'];
		$tempat = $_POST['tempat'];
		$wkt = $_POST['waktu'];
		$info = $_POST['info'];
		$foto = $_POST['poster2'];
		$idukm = $data->ID_UKM;
		$lihat = $row['view'];
		
		$nama_file = $_FILES['poster']['name'];
        $ukuran_file = $_FILES['poster']['size'];
        $tipe_file = $_FILES['poster']['type'];
        $tmp_file = $_FILES['poster']['tmp_name'];
            
        $wak = date('His');
        $nama_file_baru = $wak.$nama_file;
        $path = "assets/img/Artikel/".$nama_file_baru;
		
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
			if($ukuran_file <= 2000000){
				move_uploaded_file($tmp_file, $path);
				
				$sql = "INSERT INTO posting VALUES ('', '$judul', '$nama_file_baru', '$tgl_up', '$isi2', '$tglH', '$tempat', '$wkt', '$info', 'Event', $lihat, '$idukm')";
				$insert = oci_parse($conn, $sql);
				oci_execute($insert);
                if($insert==true){
					echo "<font color='blue'>Data berhasil diubah</font>";
					$a = oci_parse($conn, "DELETE from posting where id_posting='$id'");
                    oci_execute($a);
                } else {
					echo "<font color='red'>Gagal ubah data!</font>";
                }
            } else {
				echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
            }
        } else {
				$sql = "INSERT INTO posting VALUES ('', '$judul', '$foto', '$tgl_up', '$isi2', '$tglH', '$tempat', '$wkt', '$info', 'Event', $lihat, '$idukm')";
				$insert = oci_parse($conn, $sql);
				oci_execute($insert);
                if($insert==true){
					echo "<font color='blue'>Data berhasil diubah</font>";
					$a = oci_parse($conn, "DELETE from posting where id_posting='$id'");
                    oci_execute($a);
                } else {
					echo "<font color='red'>Gagal ubah data!</font>";
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