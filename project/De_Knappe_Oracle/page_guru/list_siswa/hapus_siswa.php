<?php
include('../../php/connect.php');
$ambil = $_GET['id_siswa'];
$sql = "DELETE FROM siswa WHERE id_siswa = $ambil";
$query = oci_parse($conn, $sql);
oci_execute($query);
if ($query==true) {
    header ('location:../siswa.php');
}
?>