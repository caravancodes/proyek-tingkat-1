<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$koneksi =  mysql_connect($dbhost, $dbuser, $dbpass);
if(! $koneksi )
{
die ('Gagal Koneksi: ' . mysql_error());
}
?>