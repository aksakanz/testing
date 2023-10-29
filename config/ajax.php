<?php
include "conn.php";
$tujuan = $_GET['tujuan'];
$kemana = mysqli_fetch_array(mysqli_query($conn, "select * from tb_tujuan where tujuan='$tujuan'"));
$data = array('tarif'   	=>  $kemana['tarif'],);
 echo json_encode($data);