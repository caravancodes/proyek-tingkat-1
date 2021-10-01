<?php
	include 'koneksi.php';
	$b = $_GET['page'];
	$id = $_GET['id'];
	
	if($_GET['page']==0){
		$c = oci_parse($conn, "select * from galeri where id_ukm='$id' limit 4");
		oci_execute($c);
	} else {
		oci_execute($c);
		$c = oci_parse($conn, "select * from galeri where id_ukm='$id' limit $b, 4");
	}
	if(oci_num_rows($c)==0){
		echo '<font color="grey">No suggestion</font>';
	}
	
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
	echo '
		<button onclick="pagination('.($b-4).')" class="pager" type="submit" name="kiri"><i><a href="">Previous</a></i></button>
		<button onclick="pagination('.($b+4).')" class="pager" type="submit" name="kanan"><i><a href="">Next</a></i></button>
		';
?>