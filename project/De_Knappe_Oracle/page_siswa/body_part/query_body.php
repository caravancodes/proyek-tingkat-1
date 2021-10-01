<?php
    $sql = "SELECT * FROM siswa where id_siswa='$cek'";
    $qry = oci_parse($conn, $sql);
    oci_execute($qry);
    $data = oci_fetch_object($qry);
?>