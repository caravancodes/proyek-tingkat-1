<div class="navbar-default col-sm-12" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" ><br>
<?php 
	include "koneksi.php";
		
	$q = $_GET["q"];  //hasil GET q disimpan dalam variable q ($q), dimana q = inputan dari text yang dioper ke URL melalui ajax.js
	$hint = "";
	if ($q != "") {  //kondisi jika hasil GET q tidak kosong
			$q = strtolower($q); //q sekarang telah diubah menjadi huruf kecil, supaya case-insensitive(huruf kecil/besar tidak dihiraukan)
			$len = strlen($q);  //hitung jumlah string dari q
			
			$query = oci_parse($conn, "SELECT * FROM posting");
				oci_execute($query);
				while($data = oci_fetch_object($query)){
				
					//stristr = mengambil sebagian string dari suatu posisi sub-string yang dicari -> stristr("string","sub-string")
					//substr = mengambil string berdasarkan indeks / nomor posisi huruf dalam string -> substr("string",int start, int length)
					if (stristr($q, substr($data->JUDUL, 0, $len))) { //kondisi pencarian string dg stristr, dimana parameter kedua menggunakan fungsi substr yg dimulai dari karakter pertama (0)
							if ($hint == "") {
									$hint = "<p class='text-left'><a href='halaman_artikel.php?ID_POSTING=".$data->ID_POSTING."'> ".$data->JUDUL." </a></p>";
									echo "".$hint."";
							} else {
									$hint = "<p class='text-left'><a href='halaman_artikel.php?ID_POSTING=".$data->ID_POSTING."'> ".$data->JUDUL." </a></p>";
									echo "".$hint."";
							}
					}
				}
			$quer = oci_parse($conn, "SELECT * FROM pengurus_ukm natural join user_admin");
				oci_execute($quer);
				while($dat = oci_fetch_object($quer)){
						if (stristr($q, substr($dat->NAMA_PENGURUS, 0, $len))) {
								if ($hint == "") {
										$hint = "<p class='text-left'><a href='bio_pengurus.php?NIM=".$dat->ID_UKM."'> ".$dat->NAMA_PENGURUS." </a></p>";
										echo "".$hint."";
								} else {
										$hint = "<p class='text-left'><a href='bio_pengurus.php?NIM=".$dat->ID_UKM."'> ".$dat->NAMA_PENGURUS." </a></p>";
										echo "".$hint."";
								}
						}
					if (stristr($q, substr($dat->JABATAN, 0, $len))) {
							if ($hint == "") {
									$hint = "<p class='text-left'><a href='bio_pengurus.php?NIM=".$dat->ID_UKM."'> ".$dat->JABATAN." ".$dat->NAMA_UKM." </a></p>";
									echo "".$hint."";
							} else {
									$hint = "<p class='text-left'><a href='bio_pengurus.php?NIM=".$dat->ID_UKM."'> ".$dat->JABATAN." ".$dat->NAMA_UKM." </a></p>";
									echo "".$hint."";
							}
					}
				}
			
	}
	// Output "No suggestion" jika inputan tidak ditemukan pada database
?>
</div>