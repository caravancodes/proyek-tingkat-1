<?php
	include 'koneksi.php';
	$jenis = $_GET['jenis'];
	$id = $_GET['id'];
	if(!$conn){
		die("Koneksi gagal");
	}
	if($jenis=="Semua"){
		$c = oci_parse($conn, "select *, DATE_FORMAT(tgl_upload, '%d /%m/%Y') from posting where id_ukm='$id' ORDER BY id_posting DESC limit 4");
		oci_execute($c);
		while($r = oci_fetch_object($c)){
			echo '
			<div class="row">
	        	<div class="col-xs-4">
					<a href="halaman_artikel.php?ID_POSTING='.$r->ID_POSTING.'">
					<img src="adminukm/assets/img/Artikel/'.$r->GAMBAR_POSTING.'">
					</a>
				</div>
	        	<div class="col-xs-8">
	        		<div class="caption"><a href="halaman_artikel.php?ID_POSTING='.$r->ID_POSTING.'">'.$r->JUDUL.'</a></div>
	        		<div class="date">'.$r["DATE_FORMAT(tgl_upload, '%d /%m/%Y')"].'</div>
	        		<div class="intro">'.substr($r['isi'], 0, 70).'...'.'
					<br><a class="readmoreY" href="halaman_artikel.php?ID_POSTING='.$r->ID_POSTING.'">Read more</a></div>
	        	</div>
	        </div>
			<hr>
			';
		}
	} else {
		$c = oci_parse($conn, "select *, DATE_FORMAT(tgl_upload, '%d /%m/%Y') from posting where id_ukm='$id' AND jenis_posting='$jenis' ORDER BY id_posting DESC limit 4");
		oci_execute($c);
		while($r = oci_fetch_object($c)){
			echo '
			<div class="row">
	        	<div class="col-xs-4">
					<a href="halaman_artikel.php?ID_POSTING='.$r->ID_POSTING.'">
					<img src="adminukm/assets/img/Artikel/'.$r->GAMBAR_POSTING.'">
					</a>
				</div>
	        	<div class="col-xs-8">
	        		<div class="caption"><a href="halaman_artikel.php?ID_POSTING='.$r->ID_POSTING.'">'.$r->JUDUL.'</a></div>
	        		<div class="date">'.$r["DATE_FORMAT(tgl_upload, '%d /%m/%Y')"].'</div>
	        		<div class="intro">'.substr($r['isi'], 0, 70).'...'.'
					<br><a class="readmoreY" href="halaman_artikel.php?ID_POSTING='.$r->ID_POSTING.'">Read more</a></div>
	        	</div>
	        </div>
			<hr>
			';
		}
	}
?>