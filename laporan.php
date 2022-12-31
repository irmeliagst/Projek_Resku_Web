<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head>
<body>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-excel.xls"); 
?>

<center>
    <h2>Laporan Penjualan</h2>
</center>

<table border="1">
    <tr>
    <th>No</th>
<th>Id</th>
<th>Tanggal</th>
<th>Nama</th>
<th>Total</th>
<th>Checkout</th>
<th>Validasi</th>
<th>No Meja</th>
    </tr>


    <?php
    include "koneksi.php";
    $no=1;
    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi");
    while($data = mysqli_fetch_assoc($transaksi))
    {
    ?>

    <tr>
       <td><?= $no++; ?></td> 
       <td><?= $data['id']; ?></td> 
       <td><?= $data['tanggal']; ?></td> 
       <td><?= $data['nama']; ?></td> 
       <td><?= $data['total']; ?></td> 
       <td><?= $data['checkout']; ?></td> 
       <td><?= $data['valid']; ?></td> 
       <td><?= $data['no_meja']; ?></td> 
    </tr>

    <?php
    }
    ?>
</table>
</body>
</html>