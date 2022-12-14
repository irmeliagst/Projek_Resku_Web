<?php 

include('koneksi.php');

$id_menu = $_GET['id_menu'];

$hapus= mysqli_query($koneksi, "DELETE FROM menu WHERE id='$id_menu'");

if($hapus)
	header('location: daftar_menu.php');
else
	echo "Hapus data gagal";

 ?>