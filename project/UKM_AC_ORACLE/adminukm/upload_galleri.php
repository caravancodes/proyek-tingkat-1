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
?>

      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Galleri</title>
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
                        <a class="active-menu"><i class="fa fa-upload fa-3x"></i> Upload <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li>
                                <a href="upload_artikel.php">Artikel</a>
                            </li>
                            <li>
                                <a href="upload_event.php">Event</a>
                            </li>
                            <li>
                                <a class="active-menu" href="upload_galleri.php">Galleri / Dokumentasi</a>
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
                        <a href="view.php"><i class="fa fa-edit fa-3x"></i> Edit / Delete</a>
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
                     <h2>Upload Gambar</h2>   
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
                                            <label>Pilih Gambar</label>
                                            <input type="file" name="dokumentasi"/>
											<p class="help-block">Upload Foto Dokumentasi. Jenis file harus jpg/jpeg/png</p>
                                        </div>
                                        
                                        <button type="submit" name="upload" class="btn btn-success">Upload</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>

                                    </form>
                                </div>
<?php
	include ("koneksi.php");
	if(isset($_POST['upload'])){
		$id = $data->ID_UKM;
		$nama_file = $_FILES['dokumentasi']['name'];
        $ukuran_file = $_FILES['dokumentasi']['size'];
        $tipe_file = $_FILES['dokumentasi']['type'];
        $tmp_file = $_FILES['dokumentasi']['tmp_name'];
            
        $waktu = date('His');
        $nama_file_baru = $waktu.$nama_file;
        $path = "assets/img/Galleri/".$nama_file_baru;
		
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
			if($ukuran_file <= 2000000){
				move_uploaded_file($tmp_file, $path);
             
				$sql = "insert into galeri values ('', '$nama_file_baru','$id')";
				$insert = oci_parse($conn,$sql);
                oci_execute($insert);
                if($insert==true){
					echo "<font color='blue'>Data berhasil ditambah</font>";
				} else {
					echo "<font color='red'>Gagal tambah data!</font>";
                }
            } else {
				echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
            }
        } else {
			echo "<font color='red'>Maaf, tipe filenya harus jpg/png/jpeg.</font>";
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
