<?php
	include 'koneksi.php';
	$jumlah = $_GET['jumlah'];
	$id = $_GET['id'];
	if(!$conn){
		die("Koneksi gagal");
	}
	if($jumlah=="semua"){
		$c = oci_parse($conn, "select * from galeri where id_ukm='$id'");
		oci_execute($c);
		while($r = oci_fetch_object($c)){
			echo '
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="adminukm/assets/img/Galleri/'.$r->GAMBAR.'" target="_blank">
					<img src="adminukm/assets/img/Galleri/'.$r->GAMBAR.'" alt="Photos" style="width:auto; height:170px;">
					</a>
				</div>
			</div>
			';
		}
	} else {
		$c = oci_parse($conn, "select * from galeri where id_ukm='$id' limit $jumlah");
		oci_execute($c);
		while($r = oci_fetch_object($c)){
			echo '
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="adminukm/assets/img/Galleri/'.$r->GAMBAR.'" target="_blank">
					<img src="adminukm/assets/img/Galleri/'.$r->GAMBAR.'" alt="Photos" style="width:auto; height:170px;">
					</a>
				</div>
			</div>
			';
		}
	}
?>