<?php 

$host = "localhost";
$user = "root";
$pass = "12345678";
$db = "db_resku"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

	if (!$koneksi) {
		die("Koneksi Gagal:".mysqli_connect_error());
	}
 ?>  