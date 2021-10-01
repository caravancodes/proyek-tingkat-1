<?php
require('koneksi.php');
$id=$_GET['ID_GAMBAR'];
$query = oci_parse($conn, "DELETE FROM galeri WHERE id_gambar='$id'");
oci_execute($query);
if($query==true){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus Dihapus')</script>";
}
header('location:view.php');

?>