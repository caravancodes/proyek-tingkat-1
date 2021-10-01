<?php
    $sql = "SELECT * FROM guru join mapel on guru.id_mapel = mapel.id_mapel where id_guru='$cek'";
    $qry = oci_parse($conn, $sql);
    oci_execute($qry);
    $data = oci_fetch_object($qry);
?>