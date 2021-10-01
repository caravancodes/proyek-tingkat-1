<?php
session_start();
include ('../../php/connect.php');
$cek=$_SESSION['user'];
$sql = "SELECT * FROM siswa JOIN mapel ON siswa.jurusan = mapel.jurusan WHERE id_siswa='$cek'";
$qry = oci_parse($conn, $sql);
oci_execute($qry);
$data = oci_fetch_object($qry);
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
echo'<select name="Jurusan" onChange="mapel(this.value)">
	<option>-- Pilih Jurusan --</option>
    <option value="'.$data->JURUSAN.'" >'.$data->JURUSAN.'</option>
</select>';

} else {
  		header("location: ../index.php");
	}
?>