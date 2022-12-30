<?php
header("Access-Control-Allow-Origin: *");
require('../../koneksi.php');
$nama = $_GET['nama'];
$id_menu = $_POST['id_menu'];
$qty = $_POST['qty'];
$tanggal = date('Y-m-d');
$result = $koneksi->query("select * from transaksi where nama = '$nama' && tanggal = '$tanggal'");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['id'] = $row['id'];
    }

    try {

        $id = $data['id'];
        $jumlah = $koneksi->query("INSERT INTO `detail_trans`(`id_transaksi`, `id_menu`, `qty`) VALUES ('$id','$id_menu','$qty')");
        echo response('', "Data berhasil dimasukkan");
        new Exception("OOpsss");
    } catch (Exception $e) {
        echo response('', $e->getMessage(), 500);
    }
}
