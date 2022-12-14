<?php 

include('koneksi.php');

$id_login = $_GET['id_login'];

$hapus= mysqli_query($koneksi, "DELETE FROM login WHERE id='$id_login'");

if($hapus)
	header('location: daftar_akun.php');
else
	echo "Hapus data gagal";

 ?>