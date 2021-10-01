<?php
	include('koneksi.php');
	include('usertoJSON.php');
	$query = oci_parse($conn, "SELECT * from posting natural join user_admin");
	oci_execute($query);
?>

<!DOCTYPE html>
<html class="no-js">
<html lang="en">

<head>
	<script src="ajax.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	<style>
	div.logoukmac{
		margin: -30px 0;
		z-index: 1000;
	}
	div.background{
		background-color: #0b5f6a;
	}
	</style>
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Formal <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
						<?php
							$sql = oci_parse($conn, "SELECT * from user_admin where kategori_ukm='Formal'");
							oci_execute($sql);
							while($data = oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seni & Musik <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
							$sql = oci_parse($conn, "SELECT * from user_admin where kategori_ukm='Seni'");
							oci_execute($sql);
							while($data=oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Olahraga <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
							$sql = oci_parse($conn, "SELECT * from user_admin where kategori_ukm='Olahraga'");
							oci_execute($sql);
							while($data=oci_fetch_object($sql)){
						?>
                            <li><a href="halaman_ukm.php?ID_UKM=<?php echo $data->ID_UKM; ?>"><?php echo $data->NAMA_UKM; ?></a></li>
                        <?php
							}
						?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Daerah <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
							$sql = oci_parse($conn, "SELECT * from user_admin where kategori_ukm='Daerah'");
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


	
	
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(img/slides/1.png)">
                </div><!--/.item-->
                <div class="item" style="background-image: url(img/slides/2.png)">
                </div><!--/.item-->
                <div class="item" style="background-image: url(img/slides/3.png)">
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section><!--/#main-slider-->

	
		<!-- Call to Action Bar -->
	    <div class="section section-dark">
			<div class="container">
			<center>
				<div class="row">
					<div class="col-md-3">
							
					</div>
					<div class="col-md-6">
							<form>
							<div class="input-group">
								<input class="form-control input-md" placeholder="Masukkan kata kunci tentang ukm yang ingin kamu cari" onKeyup="showHint(this.value)" type="text">
								<span class="input-group-btn">
									<button class="btn btn-md" type="button"><i class="icon-search"> </i></button>
								</span>
							</div>
							<div id="txtHint">
								
							</div>
						</form>
					</div>
					<div class="col-md-3">
							
					</div>
				</div>
				</center>
			</div>
		</div>
		<!-- End Call to Action Bar -->
<div id="hasilcari">
		<!-- Our Portfolio -->
        <div class="section section-white">
	        <div class="container">
	        	<div class="row">
	
				<div class="section-title">
				<center><h2>Unit Kegiatan Mahasiswa Yang Ada Di Telkom University</h2></center>
				</div>
		<hr>
		
			<ul class="grid cs-style-3">
			<?php
				$json_url = 'dataukm.json';
						$json = file_get_contents($json_url);
						$links = json_decode($json);
						foreach($links->dataukm->data as $row) {
			?>
	        	<div class="col-md-3 col-sm-4">
					<figure>
						<img src="adminukm/assets/img/Logo_ukm/<?php echo "".$row->logo_ukm.""; ?>" width="240px" height="180px" alt="img04">
						<figcaption>
							<h5 style="color: white;"><?php echo "".$row->id_ukm.""; ?></h5>
							<span><?php echo "".$row->kategori_ukm.""; ?></span>
							<a href="halaman_ukm.php?ID_UKM=<?php echo "".$row->id_ukm.""; ?>">Lihat</a>
						</figcaption>
					</figure>
	        	</div>
			<?php
				}
			?>
				
			</ul>
	        	</div>
	        </div>
	    </div>
		<!-- Our Portfolio -->
			
<hr>
		<div class="section section-white">
	        <div class="container">
	        	<div class="row">
	
				<div class="section-title">
				<center><h2>Artikel Terbaru</h2><center>
				<hr>
				</div>
				<?php
					$query = oci_parse($conn, "SELECT *, DATE_FORMAT(tgl_upload, '%d  %M  %Y') from posting natural join user_admin ORDER BY id_posting DESC limit 9");
					oci_execute($query);
					while($row = oci_fetch_object($query)){
						
				?>
					<!-- Blog Post Excerpt -->
					<div class="col-sm-4" style="height:500px;">
						<div class="blog-post blog-single-post">
							<div class="single-post-title">
								<h3><?php $jdl = wordwrap($row->JUDUL, 24, "..."); echo substr($jdl, 0, 24); ?></h3>
							</div>

							<div class="single-post-image">
								<img src="adminukm/assets/img/Artikel/<?php echo $row->GAMBAR_POSTING; ?>" width="auto" height="200px" alt="Post Title">
							</div>
							
							<div class="single-post-info">
								<i class="glyphicon glyphicon-time"></i><?php echo $row["DATE_FORMAT(tgl_upload, '%d  %M  %Y')"]; ?> &nbsp	&nbsp	
								<i class="icon-eye-open"></i><?php echo $row->VIEW; ?>
							</div>
							
							<div class="single-post-content">
								<p>
									<?php $is = wordwrap($row->ISI,46, "..."); echo "".substr($is, 0, 44); ?>
								</p>
							<a href="halaman_artikel.php?ID_POSTING=<?php echo $row->ID_POSTING; ?>" class="btn">Read more</a>
							</div>
						</div>
					</div>
					<!-- End Blog Post Excerpt -->
				<?php
					}
				?>
					
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