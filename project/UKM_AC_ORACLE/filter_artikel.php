<?php
	include 'koneksi.php';
	$jenis = $_GET['jenis'];
	$id = $_GET['id'];
	
	echo "<select name='jml' class='form-control' onChange='showArti(this.value,'<?php echo $id; ?>','<?php echo $jenis; ?>')' required><option value=''>--Filter Jumlah--</option>
			<option value='4'>4</option>
			<option value='8'>8</option>
			<option value='16'>16</option>
			<option value='Semua'>View All</option>
		</select>";
?>