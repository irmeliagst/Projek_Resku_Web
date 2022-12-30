<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

require('../../koneksi.php');
$nama = $_POST['nama'];
$kode_meja = $_POST['kode_meja'];
$tanggal = date('Y-m-d');
try {
    $result = $koneksi->query("INSERT INTO `transaksi`(`tanggal`, `nama`, `no_meja`) VALUES ('$tanggal','$nama','$kode_meja')");
    echo response('', 'Berhasil dimasukkan');
    new Exception("Oops ada error");
} catch (Exception $th) {
    echo $th->getMessage();
}
//  echo $tanggal;
// if ($result) {
    
// }