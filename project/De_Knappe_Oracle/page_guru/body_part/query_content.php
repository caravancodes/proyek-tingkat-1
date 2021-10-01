<?php
    $no = 1;
    $cekmapel = $data->ID_MAPEL;
    
    $sql_nilai = "SELECT * FROM nilai join mapel on (nilai.id_mapel=mapel.id_mapel) join remedi on (nilai.id_remedi=remedi.id_remedi) join siswa on (nilai.id_siswa=siswa.id_siswa) WHERE nilai.id_mapel = '$cekmapel'";
    $query_nilai = oci_parse($conn, $sql_nilai);
    oci_execute($query_nilai);

    $sql_soal = "SELECT * FROM soal join mapel on (soal.id_mapel=mapel.id_mapel) join remedi on (soal.id_remedi=remedi.id_remedi) WHERE soal.id_mapel = '$cekmapel'";
    $query_soal = oci_parse($conn, $sql_soal);
    oci_execute($query_soal);

    $sql_siswa = "SELECT * FROM siswa order by kelas";
    $query_siswa = oci_parse($conn, $sql_siswa);
    oci_execute($query_siswa);

    $sql_remedi = "SELECT * FROM set_remedi where id_mapel = '$cekmapel'";
    $query_remedi = oci_parse($conn, $sql_remedi);
    oci_execute($query_remedi);
?>