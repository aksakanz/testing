<?php 
include 'conn.php';

$id         = $_POST['id'];
$username   = $_POST['username'];
$nama       = $_POST['nama'];
$nik        = $_POST['nik'];
$alamat     = $_POST['alamat'];
$email      = $_POST['email'];
$telp       = $_POST['telp'];
$level      = $_POST['level'];
$password   = $_POST['password'];
$join       = $_POST['join'];

mysqli_query($conn,"update user set username='$username', nama='$nama', nik='$nik', alamat='$alamat', email='$email', telp='$telp', level='$level', password='$password' where id='$id'");

header("location:../pages/admin/index.php?page=userman");
 
?>