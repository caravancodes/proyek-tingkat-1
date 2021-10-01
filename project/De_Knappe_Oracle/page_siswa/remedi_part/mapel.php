<?php
include ('../../php/connect.php');
$isi = $_GET['jurusan'];
$sql = "SELECT * FROM mapel WHERE jurusan='$isi' OR jurusan='ALL'";
$qry = oci_parse($conn, $sql);
oci_execute($qry);
echo'<select name="mapel">
<option>-- Pilih Mapel --</option>';
while ($data = oci_fetch_object($qry)) {  
	echo'<option value="'.$data->ID_MAPEL.'">'.$data->NAMA_MAPEL.'</option> ';
}
	echo'</select>';
?>