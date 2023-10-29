<?php

$conn   = mysqli_connect("localhost", "root", "", "epa");

if (mysqli_connect_errno()) {
    echo "Gagal menghubungkan ke database : " . mysqli_connect_error();
}

?>