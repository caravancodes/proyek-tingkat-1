<br><h4>Hasil Cari</h4>
	<ul class="recent-posts">
<?php
	include "koneksi.php";
	
	$q = $_GET["q"];  //hasil GET q disimpan dalam variable q ($q), dimana q = inputan dari text yang dioper ke URL melalui ajax.js
	$hint = "";
	$query = oci_parse($conn, "SELECT * FROM posting WHERE judul LIKE '$q%'");
	oci_execute($query);
	while($data = oci_fetch_object($query)){
		echo '
			<li><a href="halaman_artikel.php?ID_POSTING='.$data->ID_POSTING.'"> '.$data->JUDUL.' </a></li>
		';
	}
?>
	</ul>