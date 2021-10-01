<?php
function delete_data($conn,$namatabel,$primarykey,$where){
$query="delete from ".$namatabel." where ".$primarykey."='$where'";
$tes=oci_parse($conn,$query);
oci_execute($tes);
oci_commit($conn);
}

function update($conn,$namatabel,$primarykey,$where,$data,$colom){
$query="UPDATE  ".$namatabel." SET ".$colom." = ".$data." where ".$primarykey."='$where'";
$tes=oci_parse($conn,$query);
oci_execute($tes);
oci_commit($conn);
}

function insert($conn,$namatabel,$data){
$query="INSERT  INTO ".$namatabel." VALUES(".$data.")";
$tes=oci_parse($conn,$query);
oci_execute($tes);
oci_commit($conn);
}
?>