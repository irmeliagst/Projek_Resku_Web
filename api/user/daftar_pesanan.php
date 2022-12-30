<?php
header("Access-Control-Allow-Origin: *");
require('../../koneksi.php');
$nama = $_GET['nama'];
$tanggal = date('Y-m-d');
$result = $koneksi->query("select * from transaksi where nama = '$nama'");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['id'] = $row['id'];
    }
  }
$id = $data['id'];
$daftarPesanan = $koneksi->query("SELECT detail_trans.id_transaksi, detail_trans.qty, detail_trans.total, menu.gambar,menu.nama,menu.harga FROM detail_trans INNER JOIN menu ON detail_trans.id_menu = menu.id WHERE id_transaksi = '$id'");
$total = $koneksi->query("select * from transaksi where nama = '$nama'");
$total = $total->fetch_assoc();
if ($daftarPesanan->num_rows > 0) {
    while ($row = $daftarPesanan->fetch_assoc()) {
        $dataPesanan[] = $row;
    }
    echo response($dataPesanan,array('jumlah'=>$total['total']));
  }
