<?php 
include 'conn.php';

$id         = $_POST['id'];
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$email      = $_POST['email'];
$telp       = $_POST['telp'];
$password   = $_POST['password'];

mysqli_query($conn,"update user set nama='$nama', alamat='$alamat', email='$email', telp='$telp', password='$password' where id='$id'");

header("location:../pages/admin/index.php?page=home");
 
?>