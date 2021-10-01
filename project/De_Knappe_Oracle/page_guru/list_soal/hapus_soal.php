<?php
include('../../php/connect.php');
$ambil = $_GET['no_soal'];
$sql = "DELETE FROM soal WHERE no_soal = $ambil";
$query = oci_parse($conn, $sql);
oci_execute($query);
if ($query==true) {
    header ('location:../soal.php');
}
?>