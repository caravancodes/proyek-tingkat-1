<?php
	include('koneksi.php');
	$nim=$_GET['NIM'];
	$quer = oci_parse($conn,"select * from user_admin where id_ukm='$nim'");
	oci_execute($quer);
	$query= oci_parse($conn, "select *, DATE_FORMAT(tgl_lahir, '%d %M %Y') from pengurus_ukm natural join user_admin where id_ukm='$nim'");
	oci_execute($query);
	$row = oci_fetch_object($quer);
	
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bio - <?php echo $row->NAMA_UKM; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	
	<script src="//use.edgefonts.net/bebas-neue.js"></script>

    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icomoon-social.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	

</head>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="UKM-AC"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown <?php $kate=$r['kategori_ukm']; if($kate == "Formal"){ ?> active <?php } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Formal <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
						<?php
							$sql = oci_parse($conn, "select * from user_admin where kategori_ukm='Formal'");
							oci_execute($sql);
							while($data=oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li class="dropdown <?php $kate=$r['kategori_ukm']; if($kate == "Seni"){ ?> active <?php } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seni & Musik <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
							$sql = oci_parse($conn, "select * from user_admin where kategori_ukm='Seni'");
							oci_execute($sql);
							while($data=oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li class="dropdown <?php $kate=$r['kategori_ukm']; if($kate == "Olahraga"){ ?> active <?php } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Olahraga <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
							$sql = oci_parse($conn, "select * from user_admin where kategori_ukm='Olahraga'");
							oci_execute($sql);
							while($data=oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li class="dropdown <?php $kate=$r['kategori_ukm']; if($kate == "Daerah"){ ?> active <?php } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Daerah <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
							$sql = oci_parse($conn, "select * from user_admin where kategori_ukm='Daerah'");
							oci_execute($sql);
							while($data=oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li ><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Biodata Pengurus <?php echo $row->NAMA_UKM; ?></h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
			<?php
				while($r = oci_fetch_object($query)){
			?>
	    		<div class="row">
	    			<!-- Product Image & Available Colors -->
	    			<div class="col-sm-3">
	    				<div class="product-image-large">
							<a href="adminukm/assets/img/Profil_user/<?php echo $r->FOTO; ?>">
								<img src="adminukm/assets/img/Profil_user/<?php echo $r->FOTO; ?>" width="auto" height="300px" alt="Item Name">
							</a>
	    				</div>
	    			</div>
	    			<!-- End Product Image & Available Colors -->
	    			<!-- Product Summary & Options -->
	    			<div class="col-sm-6 product-details">
	    				<h2><?php echo $r->NAMA_PENGURUS; ?></h2>
	    				<p>
						<?php echo $r->BIO_PENGURUS; ?>
						</p>						
						<h3>Data Diri</h3>
						<table>
							<tr>
								<td><p><strong>NIM</strong></p></td>
								<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
								<td><p><?php echo $r->NIM; ?></p></td>
							</tr>
							<tr>
								<td><p><strong>Jabatan</strong></p></td>
								<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
								<td><p><?php echo $r->JABATAN; ?></p></td>
							</tr>
							<tr>
								<td><p><strong>Jenis Kelamin</strong></p></td>
								<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
								<td><p><?php echo $r->JENIS_KELAMIN; ?></p></td>
							</tr>
							<tr>
								<td><p><strong>TTL</strong></p></td>
								<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
								<td><p><?php echo ''.$r->TEMPAT_LAHIR.', '.$r["DATE_FORMAT(tgl_lahir, '%d %M %Y')"].''; ?></p></td>
							</tr>
							<tr>
								<td><p><strong>Jurusan / Angkatan</strong></p></td>
								<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
								<td><p><?php echo "".$r->JURUSAN." / ".$r->ANGKATAN.""; ?></p></td>
							</tr>
						</table>
	    			</div>
	    			<!-- End Product Summary & Options -->			
	    		</div>
				<hr>
			<?php
				}
			?>
			</div>
		</div>

	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2017 By UKM - AC.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/scrolling-nav.js"></script>		