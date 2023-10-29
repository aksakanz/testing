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

mysqli_query($conn, "INSERT INTO user VALUES('$id', '$username', '$nama', '$nik', '$alamat', '$email', '$telp', '$level', '$password', '$join')");

header("location:../pages/admin/index.php?page=userman");
 
?>