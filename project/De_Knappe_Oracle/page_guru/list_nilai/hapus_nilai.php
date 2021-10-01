<?php
include('../../php/connect.php');
$ambil = $_GET['id_nilai'];
$sql = "DELETE FROM nilai WHERE ID_NILAI = $ambil";
$query = oci_parse($conn, $sql);
oci_execute($query);
if ($query==true) {
    header ('location:../nilai.php');
}
?>