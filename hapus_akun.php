<?php 

require('koneksi.php');

$id_login = $_GET['id_login'];

$hapus= $koneksi->query("DELETE FROM login WHERE id='$id_login'");

if($hapus)
	header('location: daftar_akun.php');
else
	echo "Hapus data gagal";

 ?>