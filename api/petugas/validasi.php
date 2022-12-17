<?php
 require('../../koneksi.php');
 $result = $koneksi->query('select * from transaksi');
 if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
       $data[] = $row;
   }
 }
//  $row = [];
//  while ($data = mysqli_fetch_assoc($result)) {
//     $row = $data;
//  }

 echo json_encode($data);
    ?>
