<?php
session_start();
include ('../../php/connect.php');
$cek=$_SESSION['user'];
$sql = "SELECT * FROM siswa natural join mapel where id_siswa='$cek'";
$qry = oci_parse($conn, $sql);
oci_execute($qry);
$data = oci_fetch_object($qry);
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {

echo'<select name="kelas" onChange="jurusan()">
    <option>-- Pilih Kelas --</option>
    <option value="'.$data->KELAS.'" >'.$data->KELAS.'</option>
</select>';

} else {
  		header("location: ../index.php");
	}
?>
