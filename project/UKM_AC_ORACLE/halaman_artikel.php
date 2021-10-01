<?php
	include('koneksi.php');
	$id=$_GET->ID_POSTING;
	$query = oci_parse($conn, "select *, DATE_FORMAT(tgl_upload,'%d %M %Y'), DATE_FORMAT(tgl_event,'%d %b %Y') from posting natural join user_admin where id_posting='$id'");
	oci_execute($query);
	$r = oci_fetch_object($query);
	$i = $r->VIEW + 1;
	$que = oci_parse($conn, "UPDATE posting SET view='$i' WHERE id_posting='$id'");
	oci_execute($que);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

<head>
	<script src="ajax.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $r->JUDUL; ?></title>

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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="UKM-AC"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown <?php $kate=$r->KATEGORI_UKM; if($kate == "Formal"){ ?> active <?php } ?>">
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
						<h1><?php if($r['jenis_posting']=="Artikel"){ echo "Artikel"; } else{ echo "Event"; } ?></h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<!-- Blog Post -->
					<div class="col-sm-8">
						<div class="blog-post blog-single-post">
							<div class="single-post-title">
								<h2><?php echo $r->JUDUL; ?></h2>
							</div>

							<div class="single-post-image">
								<img src="adminukm/assets/img/Artikel/<?php echo $r->GAMBAR_POSTING; ?>" alt="Post Title">
							</div>
							<div class="single-post-info">
								<i class="glyphicon glyphicon-time"></i><?php echo $r["DATE_FORMAT(tgl_upload,'%d %M %Y')"]; ?>&nbsp	&nbsp	
								<i class="icon-eye-open"></i><?php echo $r->VIEW; ?>
							</div>							
							<div class="single-post-content">
							<?php if($r->JENIS_POSTING=="Artikel"){ 
									echo '
										<p>'.$r->ISI.'</p>
									'; 
								  } else{ 
									echo '
										<p>'.$r->ISI.'</p><br>
										<h3>Info Acara</h3>
										<table>
											<tr>
												<td><p><strong>Tempat</strong></p></td>
												<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
												<td><p>'.$r->TEMPAT.'</p></td>
											</tr>
											<tr>
												<td><p><strong>Tanggal</strong></p></td>
												<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
												<td><p>'.$r["DATE_FORMAT(tgl_event,'%d %b %Y')"].'</p></td>
											</tr>
											<tr>
												<td><p><strong>Waktu</strong></p></td>
												<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
												<td><p>'.$r->WAKTU.'</p></td>
											</tr>
											<tr>
												<td><p><strong>Info Lain</strong></p></td>
												<td><p><strong> &nbsp; : &nbsp; </strong></p></td>
												<td><p>'.$r->INFO_LAIN.'</p></td>
											</tr>
										</table>
									'; 
								  } ?>
								
							</div>
						</div>
					</div>
					<!-- End Blog Post -->
					<!-- Sidebar -->
					<div class="col-sm-4 blog-sidebar">
						<h4>Search</h4>
						<form>
							<div class="input-group">
								<input class="form-control input-md" onKeyup="showPost(this.value)" type="text">
								<span class="input-group-btn">
									<button class="btn btn-md" type="button">Search</button>
								</span>
							</div>
							<div id="cariArt">
								
							</div>
						</form><br>
						<div id="hasil"><br>
						<h4>Artikel Populer</h4>
						<ul class="recent-posts">
						<?php
							$quer=oci_parse($conn, "select * from posting natural join user_admin where jenis_posting='Artikel' ORDER BY view DESC limit 6");
							oci_execute($quer);
							while($row=oci_fetch_object($quer)){
						?>
							<li><a href="halaman_artikel.php?ID_POSTING=<?php echo $row->ID_POSTING; ?>"><?php echo $row->JUDUL; ?></a></li>
						<?php
							}
						?>
						</ul>
						<h4>Artikel Terbaru</h4>
						<ul class="recent-posts">
						<?php
							$quer=oci_parse($conn, "select * from posting natural join user_admin where jenis_posting='Artikel' ORDER BY id_posting DESC limit 6");
							oci_execute($quer);
							while($row=oci_fetch_object($quer)){
						?>
							<li><a href="halaman_artikel.php?ID_POSTING=<?php echo $row->ID_POSTING; ?>"><?php echo $row->JUDUL; ?></a></li>
						<?php
							}
						?>
						</ul>
						<h4>Event UKM</h4>
						<ul class="recent-posts">
						<?php
							$quer=oci_parse($conn, "select * from posting natural join user_admin where jenis_posting='Event' ORDER BY id_posting DESC limit 6");
							oci_execute($quer);
							while($row=oci_fetch_object($quer)){
						?>
							<li>
							<div class="row">
								<div class="col-xs-2">
									<a href="halaman_artikel.php?ID_POSTING=<?php echo $row->ID_POSTING; ?>">
									<img src="adminukm/assets/img/Artikel/<?php echo $row->GAMBAR_POSTING; ?>" width="50px" height="auto">
									</a>
								</div>
								<div class="col-xs-10">
									<a href="halaman_artikel.php?ID_POSTING=<?php echo $row->ID_POSTING; ?>"><?php echo $row->JUDUL; ?></a>
								</div>
							<div class="row">
							</li>
						<?php
							}
						?>
						</ul>
						</div>
					</div>
					<!-- End Sidebar -->
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