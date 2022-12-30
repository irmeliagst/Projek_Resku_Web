<?php
 require('../../koneksi.php');
 $nama = $_GET['nama'];
 $tanggal = date('Y-m-d');
try {
 $result = $koneksi->query("UPDATE `transaksi` SET `checkout`='true' WHERE nama = '$nama' && tanggal = '$tanggal' && valid = 'false'");
  echo response('','Berhasil checkout');
  new Exception("Ooppss...");
} catch (Exception $e) {
  echo response('',$e->getMessage(),500);
}
