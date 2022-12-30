<?php 
include('koneksi.php');

$id_login = $_GET['id_login'];
if (!$id_login) {
    header("Location: daftar_akun.php");
}

$ambil = mysqli_query($koneksi, "SELECT * FROM login WHERE id='$id_login'");
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


    <title>Halaman Akun</title>
  </head>
  <body>
 
 <!-- Form Registrasi -->
 <div class="container">
    <h3 class="text-center mt-3 mb-5">Halaman Edit Akun</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit_akun.php" enctype="multipart/form-data">
      <div class="form-row"> 
        <div class="form-group col-md-6">
            <input type="hidden" name="id" value="<?=$result[0]['id']?>">
          <label for="user">Username</label>
          <input type="text" class="form-control" id="user" name="username"  value="<?= $result[0]['username'] ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="pass">Password</label>
          <input type="password" class="form-control" id="pass" name="password"  value="<?= $result[0]['password'] ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama"  value="<?= $result[0]['nama'] ?>" required>
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" required>
          <label class="form-check-label" for="jk">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan" required>
          <label class="form-check-label" for="jk">Perempuan</label>
        </div>
      </div>
      <!-- <div class="form-group">
        <label for="tgl">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl" name="tanggal_lahir">
      </div> -->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $result[0]['alamat'] ?>" required>
        </div>
        <div class="form-group col-md-2">
          <label for="telp">No. Telephone</label>
          <input type="text" class="form-control" id="telp" name="telp" value="<?= $result[0]['telp'] ?>" required>
        </div>
      <div class="form-group col-md-4">
          <label for="status">Status Registrasi</label>
          <select id="status" class="form-control" name="status" required>
            <option selected>Pilih...</option>
            <option value="petugas">Petugas</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div> 
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $result[0]['email'] ?>" required>
      </div>    
        <div class="form-group">
          <label for="gambar">Foto Akun</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" required>
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        <a href="daftar_menu.php" class="btn btn-success mt-6">Cancel</a>
  </form>
  </div>
  </div>
  </div>
  <!-- Akhir Form Registrasi --> 

  <?php 
  if(isset($_POST['tambah'])){
    $id = $_POST['id'];
    // echo $id;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    // $nama_file = $_FILES['gambar']['name'];
    // $source = $_FILES['gambar']['tmp_name'];
    // $folder = './upload/';

    // move_uploaded_file($source, $folder.$nama_file);
    // $insert = mysqli_query($koneksi, "INSERT INTO akun VALUES ('$id', '$nama', '$username', '$password', '$status', '$jk', '$telp', '$alamat', '$gambar')");

    $ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif');
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];	

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 1044070){			
        move_uploaded_file($file_tmp, 'images/'.$gambar);
       try {
        $insert = mysqli_query($koneksi, "UPDATE `login` SET `nama`='$nama',`username`='$username',`password`='$password',`status`='$status',`jk`='$jk',`telp`='$telp',`alamat`='$alamat',`gambar`='$gambar',`email`='$email' WHERE id='$id' ");
        if($insert){
                header("Location: daftar_akun.php");
          }else{
            echo 'GAGAL MENGUPLOAD GAMBAR';
          }
        new Exception("Error..");
       
       } catch (Exception $th) {
        echo $th->getMessage();
       }
      }else{
        echo 'UKURAN FILE TERLALU BESAR';
      }
    }else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

    // if($insert){
    //   header("location: daftar_akun.php");
    // }
    // else {
    //   echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    // }
  }

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