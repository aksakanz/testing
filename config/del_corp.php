<?php 
include 'conn.php';

$id_pt = $_GET['id_pt'];
mysqli_query($conn,"DELETE FROM pt WHERE id_pt='$id_pt'");
header("location:../pages/admin/index.php?page=welcome");
 
?>