<?php
require('koneksi.php');
$id=$_GET['NIM'];
$query = oci_parse($conn, "DELETE FROM pengurus_ukm WHERE nim='$id'");
oci_execute($query);
if($query==true){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus Dihapus')</script>";
}
header('location:view.php');

?>