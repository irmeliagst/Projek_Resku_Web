<?php
header("Access-Control-Allow-Origin: *");
require('../../koneksi.php');
$nama = $_GET['nama'];
$tanggal = date('Y-m-d');
$result = $koneksi->query("select * from transaksi where nama = '$nama' && tanggal = '$tanggal'");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['id'] = $row['id'];
    }
    // echo response($data,'Data Menu');
//    print_r($data);
  }
$id = $data['id'];
$jumlah = $koneksi->query("select count(*) as jumlah from detail_trans where id_transaksi = '$id'");
$jumlah = mysqli_fetch_array($jumlah);
echo response($jumlah, 'Jumlah Pesanan');
