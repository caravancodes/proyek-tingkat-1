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
    <title>Setting</title>
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
font-size: 16px;"> <i class="glyphicon glyphicon-time"></i> &nbsp; &nbsp; <?php echo date("D, j F Y"); ?> &nbsp; <a href="logout.php"class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
				
					
                    <li>
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
                        <a href="view.php"><i class="fa fa-edit fa-3x"></i> Edit / Delete</a>
                    </li> 
                  <li >
                        <a class="active-menu" href="setting.php"><i class="fa fa-cog fa-3x"></i> Setting</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Setting</h2>   
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
                                            <label>Logo UKM</label>
                                            <input type="file" name="logo"/>
											<input type="hidden" name="logo2" value="<?php echo $data->LOGO_UKM; ?>"/>
											<p class="help-block">Ganti Logo UKM. Tipe file harus jpeg/jpg/png</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" value="<?php echo $data->USERNAME; ?>" placeholder="Masukkan Username" name="username" />
                                        </div>
										<div class="form-group">
                                            <label>Password Baru</label>
                                            <input class="form-control" type="password" placeholder="Masukkan Password" name="pass1" />
											<input type="hidden" name="p1" value="<?php echo $data->PASSWORD; ?>"/>
                                        </div>
										<div class="form-group">
                                            <label>Ulangi Password</label>
                                            <input class="form-control" type="password" placeholder="Ulangi Password" name="pass2" />
											<input type="hidden" name="p2" value="<?php echo $data->PASSWORD; ?>"/>
                                        </div>
                                        <button type="submit" name="ganti" class="btn btn-warning">Ganti</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>

                                    </form>
                                </div>
<?php
	include ("koneksi.php");
	if(isset($_POST['ganti'])){
		$username = $_POST['username'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$id = $data->ID_UKM;
		$foto = $_POST['logo2'];
		$p1 = $_POST['p1'];
		$p2 = $_POST['p2'];
		
		$nama_file = $_FILES['logo']['name'];
        $ukuran_file = $_FILES['logo']['size'];
        $tipe_file = $_FILES['logo']['type'];
        $tmp_file = $_FILES['logo']['tmp_name'];
            
        $waktu = date('His');
        $nama_file_baru = $waktu.$nama_file;
        $path = "assets/img/Logo_ukm".$nama_file_baru;
		$path2 = "assets/img/Artikel/".$nama_file_baru;
		if($pass1=="" && $pass2==""){
			if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
				if($ukuran_file <= 2000000){
					move_uploaded_file($tmp_file, $path);
					move_uploaded_file($tmp_file, $path2);
					$sql = "update user_admin set username='$username', password='$p1', logo_ukm='$nama_file_baru' where id_ukm='$id'";
					$te_sql = oci_parse($conn, $sql);
                    oci_execute($te_sql);
					if($te_sql==true){
						echo "<font color='blue'>Data berhasil diubah</font>";
					} else {
						echo "<font color='red'>Gagal ubah data!</font>";
					}
				} else {
					echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
				}
			} else {
				$sql = "update user_admin set username='$username', password='$p1', logo_ukm='$foto' where id_ukm='$id'";
                    $te_sql = oci_parse($conn, $sql);
                    oci_execute($te_sql);
					if($te_sql==true){
						echo "<font color='blue'>Data berhasil diubah</font>";
					} else {
						echo "<font color='red'>Gagal ubah data!</font>";
					}
			}
			
			
			
		} else if($pass1 == $pass2){
			if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
				if($ukuran_file <= 2000000){
					move_uploaded_file($tmp_file, $path);
					move_uploaded_file($tmp_file, $path2);
					$pass = md5($pass1);
				 
					$sql = "update user_admin set username='$username', password='$pass', logo_ukm='$nama_file_baru' where id_ukm='$id'";
					$te_sql = oci_parse($conn, $sql);
                    oci_execute($te_sql);
					if($te_sql==true){
						echo "<font color='blue'>Data berhasil diubah</font>";
					} else {
						echo "<font color='red'>Gagal ubah data!</font>";
					}
				} else {
					echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
				}
			} else {
				$pass = md5($pass1);
				
				$sql = "update user_admin set username='$username', password='$pass', logo_ukm='$foto' where id_ukm='$id'";
					$te_sql = oci_parse($conn, $sql);
                    oci_execute($te_sql);
					if($te_sql==true){
						echo "<font color='blue'>Data berhasil diubah</font>";
					} else {
						echo "<font color='red'>Gagal ubah data!</font>";
					}
			}

		} else {
			echo "<font color='red'>Password dan konfirmasi password tidak sama! password anda masih tetap sama.</font>";
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
