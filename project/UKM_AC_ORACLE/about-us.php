<?php
	include('koneksi.php');
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

    <title>About Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	<style>
		div.footer{
			min-height: 105px;
		}
		div.login{
			border-left: 1px solid grey;
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
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
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
                    <li class="dropdown">
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
                    <li class="dropdown">
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
                    <li class="dropdown">
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
                    <li class="active"><a href="about-us.php">About Us</a></li>
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
						<h1>About Us</h1>
					</div>
				</div>
			</div>
		</div>

<hr>		

        <div class="section">
	    	<div class="container">
				<div class="row">
					<!-- Team Member -->
					<div class="col-md-4 col-sm-6">
						<div class="team-member">
							<!-- Team Member Photo -->
							<div class="team-member-image"><img src="img/team/1.png" alt="Name Surname"></div>
							<div class="team-member-info">
								<ul>
									<!-- Team Member Info & Social Links -->
									<li class="team-member-name">
										Ahmad Dzaky Abrori
										<!-- Team Member Social Links -->
										<span class="team-member-social">
											<a href="https://www.facebook.com/ahmad.dzakyabrori"><i class="icon-facebook"></i></a>
											<a href="https://www.instagram.com/dzaky.brori/"><i class="icon-instagram"></i></a>
											<a href="mailto:broridzaky2702@gmail.com"><i class="icon-google-plus"></i></a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Team Member -->
					<div class="col-md-4 col-sm-6">
						<div class="team-member">
							<div class="team-member-image"><img src="img/team/2.png" alt="Name Surname"></div>
							<div class="team-member-info">
								<ul>
									<li class="team-member-name">
										Elisabeth Meisah
										<span class="team-member-social">
											<a href="https://www.facebook.com/elisabethmeysah.simamora"><i class="icon-facebook"></i></a>
											<a href="https://www.instagram.com/elisabethmeisah/"><i class="icon-instagram"></i></a>
											<a href="mailto:elisabethmeisah@gmail.com"><i class="icon-google-plus"></i></a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-member">
							<div class="team-member-image"><img src="img/team/3.png" alt="Name Surname"></div>
							<div class="team-member-info">
								<ul>
									<li class="team-member-name">
										Seto Jalu Priyono
										<span class="team-member-social">
											<a href="https://www.facebook.com/setojalu.p"><i class="icon-facebook"></i></a>
											<a href="https://www.instagram.com/p_seto/"><i class="icon-instagram"></i></a>
											<a href="mailto:punzer4@yahoo.co.id"><i class="icon-google-plus"></i></a>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<hr>

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