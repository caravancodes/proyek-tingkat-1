<?php
$severname = "localhost/XE";
$user = "deknappe";
$pass = "deknappe";
$conn = oci_connect ("$user","$pass","$severname");
if (!$conn) {
    echo 'Database Tidak Ada';
}
?>