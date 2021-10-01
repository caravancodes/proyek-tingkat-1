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

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit / Delete</title>
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
		.a{
			text-decoration: none;
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
                    <li >
                        <a class="active-menu" href="view.php"><i class="fa fa-edit fa-3x"></i> Edit / Delete</a>
                    </li> 
                  <li >
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
                     <h2>Edit / Delete</h2>   
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
                                    <form role="form-inline" action="" method="POST">
                                        <div class="form-group form-inline">
                                            <select class="form-control" name="pilih">
                                                <option>--Pilihan--</option>
                                                <option value="Artikel">Posting Artikel</option>
                                                <option value="Event">Posting Event</option>
                                                <option value="Galleri">Posting Galleri</option>
                                                <option value="Pengurus">Pengurus UKM</option>
                                                <option value="UKM">Tentang UKM</option>
                                            </select>
											<button type="submit" name="lihat" class="btn btn-primary">Lihat Data</button>
                                        </div>
                                    </form>
                                </div>
<?php
	include ("koneksi.php");
	if(isset($_POST['lihat'])){
		$lihat = $_POST['pilih'];
		$id = $data->ID_UKM;
		$no = 1;
		if($lihat == "Artikel"){
			$sql = "SELECT *, DATE_FORMAT(tgl_upload,'%d/%m/%Y') from posting natural join user_admin where jenis_posting='artikel' AND id_ukm='$id'";
			$query = oci_parse($conn, $sql);
			oci_execute($query);
			echo '
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr class="info">
						<th>No</th>
						<th>Judul</th>
						<th>Gambar</th>
						<th>Tanggal Upload</th>
						<th>Isi Artikel</th>
						<th colspan=2>Edit / Delete</th>
					  </tr>
					</thead>
					<tbody>
			';
			 
 
			while ($row = oci_fetch_object($query)){
				echo '
					<tr>
						<td>'.$no++.'</td>
						<td>'.$row->JUDUL.'<br>Dilihat : '.$row->VIEW.' kali</td>
						<td><img src="assets/img/Artikel/'.$row->GAMBAR_POSTING.'" width="200px"></td>
						<td>'.$row["DATE_FORMAT(tgl_upload,'%d/%m/%Y')"].'</td>
						<td style="width: 30%">'.substr($row->ISI,0,200).'</td>
						<td><a href="update_artikel.php?ID_POSTING='.$row->ID_POSTING.'"><button name="ganti" class="btn btn-sm btn-warning">Edit</button></a></td>
						<td><a href="delete.php?ID_POSTING='.$row->ID_POSTING.'"><button class="btn btn-sm btn-danger">Delete</button></a></td>
					</tr>
				';
			}
			echo '
				</tbody>
			  </table>
			</div>
			';

		}else if($lihat == "Event"){
			$sql = "select *, DATE_FORMAT(tgl_upload,'%d/%m/%Y'), DATE_FORMAT(tgl_event,'%d/%m/%Y') from posting natural join user_admin where jenis_posting='event' AND id_ukm='$id'";
			$query = oci_parse($conn, $sql);
			oci_execute($query);
			echo '
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr class="info">
						<th>No</th>
						<th>Nama Event</th>
						<th>Poster</th>
						<th>Tanggal Upload</th>
						<th>Deskripsi Event</th>
						<th>Keterangan</th>
						<th colspan=2>Edit / Delete</th>
					  </tr>
					</thead>
					<tbody>
			';

			while ($row = oci_fetch_object($query)){
				echo '
					<tr>
						<td>'.$no++.'</td>
						<td>'.$row->JUDUL.'<br>Dilihat : '.$row->VIEW.' kali</td>
						<td><img src="assets/img/Artikel/'.$row->GAMBAR_POSTING.'" width="200px"></td>
						<td>'.$row["DATE_FORMAT(tgl_upload,'%d/%m/%Y')"].'</td>
						<td style="width: 20%">'.substr($row->ISI,0,200).'</td>
						<td style="width: 30%"><ul>
								<li>Tanggal Pelaksanaan : '.$row["DATE_FORMAT(tgl_event,'%d/%m/%Y')"].'</li>	
								<li>Tempat Pelaksanaan	: '.$row->TEMPAT.'</li>	
								<li>Waktu Pelaksanaan	: '.$row->WAKTU.'</li>	
								<li>Info Lain			: '.$row->INFO_LAIN.'</li>	
						</ul></td>
						<td><a href="update_event.php?ID_POSTING='.$row->ID_POSTING.'"><button name="ganti" class="btn btn-sm btn-warning">Edit</button></a></td>
						<td><a href="delete.php?ID_POSTING='.$row->ID_POSTING.'"><button class="btn btn-sm btn-danger">Delete</button></a></td>
					</tr>
				';
			}
			
			echo '
				</tbody>
			  </table>
			</div>
			';
			
		}else if($lihat == "Galleri"){
			$sql = "select * from galeri natural join user_admin where id_ukm='$id'";
			$query = oci_parse($conn, $sql);
			oci_execute($query);
			echo '
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr class="info">
						<th>No</th>
						<th>Gambar</th>
						<th colspan=2>Edit / Delete</th>
					  </tr>
					</thead>
					<tbody>
			';

			while ($row = oci_fetch_object($query)){
				echo '
					<tr>
						<td>'.$no++.'</td>
						<td><img src="assets/img/Galleri/'.$row->GAMBAR.'" width="200px"></td>
						<td><a href="update_galleri.php?ID_GAMBAR='.$row->ID_GAMBAR.'"><button name="ganti" class="btn btn-sm btn-warning">Edit</button></a></td>
						<td><a href="delete_galleri.php?ID_GAMBAR='.$row->ID_GAMBAR.'"><button class="btn btn-sm btn-danger">Delete</button></a></td>
					</tr>
				';
			}
			
			echo '
				</tbody>
			  </table>
			</div>
			';
			
		}else if($lihat == "Pengurus"){
			$sql = "select *, DATE_FORMAT(tgl_lahir,'%d %b %Y') from pengurus_ukm natural join user_admin where id_ukm='$id'";
			$query = oci_parse($conn, $sql);
			oci_parse($query);
			echo '
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr class="info">
						<th>No</th>
						<th>Foto</th>
						<th>Bio Data</th>
						<th colspan=2>Edit / Delete</th>
					  </tr>
					</thead>
					<tbody>
			';

			while ($row = oci_fetch_object($query)){
				echo '
					<tr>
						<td>'.$no++.'</td>
						<td><img src="assets/img/Profil_user/'.$row->FOTO.'" width="200px"></td>
						<td><ul>
								<li>Nama			: '.$row->NAMA_PENGURUS.'</li>	
								<li>NIM				: '.$row->NIM.'</li>	
								<li>Jenis Kelamin	: '.$row->JENIS_KELAMIN.'</li>	
								<li>Jabatan			: '.$row->JABATAN.'</li>	
								<li>TTL				: '.$row->TEMPAT_LAHIR.', '.$row["DATE_FORMAT(tgl_lahir,'%d %b %Y')"].'</li>	
								<li>Jurusan/Angkatan: '.$row->JURUSAN.' ('.$row->ANGKATAN.')</li>	
								<li>Bio				: '.$row->BIO_PENGURUS.'</li>	
						</ul></td>
						<td><a href="update_pengurus.php?NIM='.$row->NIM.'"><button name="ganti" class="btn btn-sm btn-warning">Edit</button></a></td>
						<td><a href="delete_pengurus.php?NIM='.$row->NIM.'"><button class="btn btn-sm btn-danger">Delete</button></a></td>
					</tr>
				';
			}
			
			echo '
				</tbody>
			  </table>
			</div>
			';
			
		}else if($lihat == "UKM"){
			$sql = "select * from ukm_page natural join user_admin where id_ukm='$id'";
			$query = oci_parse($conn, $sql);
			oci_execute($query);
			echo '
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr class="info">
						<th>No</th>
						<th>Logo UKM</th>
						<th>Tentang UKM</th>
						<th>Prestasi UKM</th>
						<th colspan=2>Edit / Delete</th>
					  </tr>
					</thead>
					<tbody>
			';

			while ($row = oci_fetch_object($query)){
				echo '
					<tr>
						<td>'.$no++.'</td>
						<td><img src="assets/img/Logo_ukm/'.$row->LOGO_UKM.'" width="200px"></td>
						<td style="width: 30%">'.$row->DESKRIPSI_UKM.'</td>
						<td style="width: 30%">'.$row->PRESTAS_UKM.'</td>
						<td><a href="update_aboutukm.php?ID_DESKRIPSI='.$row->ID_DESKRIPSI.'"><button name="ganti" class="btn btn-sm btn-warning">Edit</button></a></td>
						<td><a href="delete_about.php?ID_DESKRIPSI='.$row->ID_DESKRIPSI.'"><button class="btn btn-sm btn-danger">Delete</button></a></td>
					</tr>
				';
			}
			
			echo '
				</tbody>
			  </table>
			</div>
			';
			
		} else {
			echo "<font color='red'>Data Kosong!</font>";
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
