<?php
require('koneksi.php');
$id=$_GET['ID_POSTING'];
$query = oci_parse($conn, "DELETE FROM posting WHERE id_posting='$id'");
oci_execute($query);
if($query==true){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
}else{
	echo "<script>alert('Data Gagal Dihapus Dihapus')</script>";
}
header('location:view.php');

?>