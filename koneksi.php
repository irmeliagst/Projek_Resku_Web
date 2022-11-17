<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_resku"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

	if (!$koneksi) {
		die("Koneksi Gagal:".mysqli_connect_error());
	}
 ?>