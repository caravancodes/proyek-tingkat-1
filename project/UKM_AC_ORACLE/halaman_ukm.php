<?php
	include('koneksi.php');
	$id=$_GET->ID_UKM;
	$query = oci_parse($conn, "select * from user_admin WHERE id_ukm='$id'");
	oci_execute($query);
	$dat = oci_fetch_object($query);
	
	$quer = oci_parse($conn, "select * from ukm_page WHERE id_ukm='$id'");
	oci_execute($quer);
	$da = oci_fetch_object($quer);
	
	
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

    <title><?php echo $dat->NAMA_UKM; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	<style>
	.readmoreY{
		color: blue;
	}
	.readmoreY:hover{
		color: #5dddd3;
	}
	.panelH:hover {
		color: #5dddd3;
	}
	</style>
	<script src="//use.edgefonts.net/bebas-neue.js"></script>

    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icomoon-social.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="ajax_ukm.js"></script>
	
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
                    <li class="dropdown <?php $kate=$dat['kategori_ukm']; if($kate == "Formal"){ echo "active"; } ?>">
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
                    <li class="dropdown <?php $kate=$dat['kategori_ukm']; if($kate == "Seni"){ echo "active"; } ?>">
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
                    <li class="dropdown <?php $kate=$dat['kategori_ukm']; if($kate == "Olahraga"){ echo "active"; } ?>">
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
                    <li class="dropdown <?php $kate=$dat['kategori_ukm']; if($kate == "Daerah"){ echo "active"; } ?>">
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
						<h1><?php echo $dat->NAMA_UKM; ?></h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
				<div class="col-sm-4">
				<a href="adminukm/assets/img/Logo_ukm/<?php echo $dat->LOGO_UKM; ?>">
					<img class="img-responsive" src="adminukm/assets/img/Logo_ukm/<?php echo $dat->LOGO_UKM; ?>" width="250px" alt="logo">
				</a>
				</div>
				<div class="col-sm-8">
						<div class="panel panel-info">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" class="panelH" href="#collapse1">APA SIH <?php echo $dat->NAMA_UKM; ?> ITU?</a>
							</h4>
						  </div>
						  <div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body text-justify">&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo $da->DESKRIPSI_UKM; ?></div>
						  </div>
						</div>
						<div class="panel panel-info">
						  <div class="panel-heading">
							<h4 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" class="panelH" href="#collapse2">Prestasi yang pernah diraih</a>
							</h4>
						  </div>
						  <div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body"><?php echo $da->PRESTASI_UKM; ?></div>
						  </div>
						</div>
				</div>
			</div>
		</div>
		</div>

<hr>

        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<!-- Featured News -->
	        		<div class="col-sm-6 featured-news">
	        			<h2>Posting Terbaru</h2>
						<form class="form-inline">
								<select name="jenis" class="form-control" onChange="showArt(this.value,'<?php echo $id; ?>')">
									<option>--Filter Jenis--</option>
									<option value="Artikel">Artikel</option>
									<option value="Event">Event</option>
									<option value="Semua">View All</option>
								</select>
								<div id="filterJml"></div>
						</form><br>
						<div id="filterPost">
						<?php
						$q = oci_parse($conn, "select *, DATE_FORMAT(tgl_upload, '%d /%m/%Y') from posting natural join user_admin WHERE id_ukm='$id' ORDER BY id_posting DESC limit 4");
						oci_execute($q);
							while($r = oci_fetch_object($q)){
						?>
	        			<div class="row">
	        				<div class="col-xs-4">
								<a href="halaman_artikel.php?ID_POSTING=<?php echo $r->ID_POSTING; ?>">
								<img src="adminukm/assets/img/Artikel/<?php echo $r->GAMBAR_POSTING; ?>">
								</a>
							</div>
	        				<div class="col-xs-8">
	        					<div class="caption"><a href="halaman_artikel.php?ID_POSTING=<?php echo $r->ID_POSTING; ?>"><?php echo $r->JUDUL; ?></a></div>
	        					<div class="date"><?php echo $r["DATE_FORMAT(tgl_upload, '%d /%m/%Y')"]; ?></div>
	        					<div class="intro"><?php echo "".substr($r->ISI, 0, 70)."..."; ?>
								<br><a class="readmoreY" href="halaman_artikel.php?ID_POSTING=<?php echo $r->ID_POSTING; ?>">Read more</a></div>
	        				</div>
	        			</div>
						<hr>
						<?php
							}
						?>
						</div>
	        		</div>
	        		<!-- End Featured News -->
	        		<!-- Latest News -->
					<?php
						$a = oci_parse($conn, "select * from user_admin natural join pengurus_ukm WHERE id_ukm='$id' AND jabatan LIKE 'Ketua'");
						oci_execute($a);
						$b = oci_fetch_object($a);
					?>
	        		<div class="col-sm-6 latest-news">
						<h2>Ketua <?php echo $dat->NAMA_UKM; ?></h2>
	        			<div class="team-member">
							<div class="team-member-image"><img src="adminukm/assets/img/Profil_user/<?php echo $b->FOTO; ?>" alt="Foto" width="500px"></div>
							<div class="team-member-info">
								<ul>
									<li class="team-member-name">
										<?php echo $b->NAMA_PENGURUS; ?>
										<span class="team-member-social">
											<a class="readmoreY" href="bio_pengurus.php?NIM=<?php echo $id; ?>">view</a>
										</span>
									</li>
									<li><?php echo $b->JABATAN; ?></li>
								</ul>
							</div>
						</div>
	        		</div>
	        		<!-- End Featured News -->
	        	</div>
	        </div>
	    </div>
		
<hr>
		<div class="section">
	    	<div class="container">
				<div class="row">
				<div class="col-sm-12">
						<h1>Galleri</h1>
						<form class="form-inline">
								<select name="limitG" class="form-control" onChange="showGaleri(this.value,'<?php echo $id; ?>')">
									<option>--Filter--</option>
									<option value="4">4</option>
									<option value="8">8</option>
									<option value="12">12</option>
									<option value="16">16</option>
									<option value="semua">View All</option>
								</select>
						</form><br>
						<div class="row" id="gal">
						<?php
							$c = oci_parse($conn, "select * from galeri where id_ukm='$id' limit 8");
							oci_execute($c);
							while($r = oci_fetch_object($c)){
						?>
							<div class="col-md-3">
							  <div class="thumbnail">
								<a href="adminukm/assets/img/Galleri/<?php echo $r->GAMBAR; ?>" target="_blank">
								  <img src="adminukm/assets/img/Galleri/<?php echo $r->GAMBAR; ?>" alt="Photos" style="width:auto; height:170px;">
								</a>
							  </div>
							</div>
						<?php
							}
						?>
						</div>
					</div>
				</div>
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

    </body>
</html>