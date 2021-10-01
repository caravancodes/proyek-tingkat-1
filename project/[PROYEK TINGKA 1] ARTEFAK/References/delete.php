<?php
require('connect.php');
require('function.php');
$nim=$_GET['nim'];
$namatabel="mahasiswa";
$primarykey = "nim";
 delete_data($conn,$namatabel,$primarykey,$nim);
header('location:daftarmahasiswa.php');

?>