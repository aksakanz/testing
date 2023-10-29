<?php 
include 'conn.php';

$id_pt          = $_POST['id_pt'];
$nama_pt        = $_POST['nama_pt'];
$alamat         = $_POST['alamat'];
$npwp           = $_POST['npwp'];
mysqli_query($conn, "INSERT INTO pt VALUES('$id_pt', '$nama_pt', '$alamat', '$npwp')");

header("location:../pages/admin/index.php?page=welcome");
 
?>