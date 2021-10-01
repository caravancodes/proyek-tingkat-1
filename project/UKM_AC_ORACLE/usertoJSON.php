<?php
	include "koneksi.php";
	$query = oci_parse($conn, "SELECT * FROM user_admin");
	oci_execute($query);
	$dataukm = array();
	$data = array();
	$ukm = array();

/*
	foreach($query as $row) {
		$contents[] = $row;
	}
*/

	while($row = oci_fetch_object($query)) {
		$ukm[] = array(
			'id_ukm' => ''.$row->ID_UKM.'',
			'nama_ukm' => ''.$row->NAMA_UKM.'',
			'kategori_ukm' => ''.$row->KATEGORI_UKM.'',
			'logo_ukm' => ''.$row->LOGO_UKM.''
		);
	}

	$data['data'] = $ukm;
	$datapinjam['dataukm'] = $data;

	$json_data = json_encode($datapinjam, JSON_PRETTY_PRINT);
	file_put_contents('dataukm.json', $json_data); //export to "data.json"
?>
