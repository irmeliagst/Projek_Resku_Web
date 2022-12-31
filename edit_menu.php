<?php

include('koneksi.php');

$id_menu = $_GET['id_menu'];
if (!$id_menu) {
  header("Location: daftar_menu.php");
}

$ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
// print_r($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <title>Halaman Edit Menu</title>
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT MENU</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit_menu.php" enctype="multipart/form-data">
        <div class="form-group">
        <input type="hidden" name="id" value="<?=$result[0]['id']?>">
          <label for="menu1">Nama Menu</label>
          <input type="text" class="form-control" id="menu1" name="nama" value="<?= $result[0]['nama'] ?>" required>
        </div>
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="text" class="form-control" id="harga1" name="harga" value="<?= $result[0]['harga'] ?>" required>
        </div>
        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" required>
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        <!-- <button type="reset" class="btn btn-danger" name="reset">Hapus</button> -->
        <a href="daftar_menu.php" class="btn btn-success mt-6">Batal</a>
        </form>
  </div>
  </div>
  <!-- Akhir Form Registrasi --> 

  <?php 


// $auto = mysqli_query("SELECT max(id) as max_id FROM menu");
// $data = mysqli_fetch_array($auto);
// $code = $data['max_id'];
// $urutan = (int)substr($code, 1, 3);
// $urutan++;
// $huruf = "K";
// $kd_kat = $huruf . sprintf("%03s", $urutan);

  if(isset($_POST['tambah'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $id_kategori = $_POST['id_kat'];
    // $nama_file = $_FILES['gambar']['name'];
    // $source = $_FILES['gambar']['tmp_name'];
    // $folder = './upload/';
    // move_uploaded_file($source, $folder.$nama_file);
    // $insert = mysqli_query($koneksi, "INSERT INTO menu VALUES ('$id', '$gambar', '$nama', '$jenis', '$harga')");

  
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif');
			$gambar = $_FILES['gambar']['name'];
			$x = explode('.', $gambar);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['gambar']['size'];
			$file_tmp = $_FILES['gambar']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'images/'.$gambar);
					$update = mysqli_query($koneksi, "UPDATE `menu` SET `gambar`='$gambar',`nama`='$nama',`harga`='$harga' WHERE id='$id' ");
          if($update){
            header("Location: daftar_menu.php");
            echo 'FILE BERHASIL DI UPLOAD';
      }else{
        echo 'GAGAL MENGUPLOAD GAMBAR';
      }
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
    // if($insert){
    //   header("location: daftar_menu.php");
    // }
    // else {
    //   echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    // }
  

   ?>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>