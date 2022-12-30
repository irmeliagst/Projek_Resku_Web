<?php
header("Access-Control-Allow-Origin: *");
 require('../../koneksi.php');
 $result = $koneksi->query('select * from menu');
 if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
       $data[] = $row;
   }
   echo response($data,'Data Menu');
  // print_r($data);
 }
//  $row = [];
//  while ($data = mysqli_fetch_assoc($result)) {
//     $row = $data;
//  }

    ?>
