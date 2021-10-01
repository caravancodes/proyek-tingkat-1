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
    <title>Upload Tentang UKM</title>
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
				
					
                    <li>
                        <a class="active-menu"><i class="fa fa-upload fa-3x"></i> Upload <span class="fa arrow"></span></a>
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
                                <a class="active-menu" href="upload_aboutukm.php">Tentang UKM</a>
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
                     <h2>Upload Tentang UKM</h2>   
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
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Tentang UKM</label>
                                            <textarea class="form-control" name="about" rows="7"></textarea>
											<p class="help-block">Tulis Mengenai Apa itu UKM <?php echo $data->NAMA_UKM; ?>?.</p>
                                        </div>
										<div class="form-group">
                                            <label>Prestasi UKM</label>
                                            <textarea class="form-control" name="prestasi" rows="7"></textarea>
											<p class="help-block">Prestasi Yang Pernah Diraih UKM <?php echo $data->NAMA_UKM; ?>.</p>
										</div>
                                        <button type="submit" name="upload" class="btn btn-success">Upload</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>

                                    </form>
								</div>
<?php
	include ("koneksi.php");
	$ukm = $data->ID_UKM;
	
if(isset($_POST['upload'])){
	$query = oci_parse($conn, "select * from ukm_page where id_ukm='$ukm'");
	oci_execute($query);
    $row = oci_fetch_object($query);
	$status = $row->STATUS;
	if($query==true){
		if($status=="sudah"){
			echo "<font color='red'>Anda sudah pernah mengupload tentang ukm! Anda hanya dapat mengeditnya dimenu edit/delete</font>";
		}
		if($status!="sudah") {
			$tentang = $_POST['about'];
			$ten = nl2br($tentang);
			$prestasi = $_POST['prestasi'];
			$pres = nl2br($prestasi);
			$id = $data->ID_UKM;
			$sql = "INSERT into ukm_page values ('','$ten', '$pres', 'sudah', '$id')";
            $insert = oci_parse($conn, $sql);
			oci_execute($insert);
            if($insert==true){
				echo "<font color='blue'>Data berhasil ditambah</font>";
			} else {
				echo "<font color='red'>Gagal tambah data!</font>";
			}
		}
	}
}
?>
                            </div>
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
