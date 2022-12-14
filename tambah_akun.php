<?php
ob_start();
include 'koneksi.php';
if (isset($_POST['tambah'])) {
  $id = '';
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

  $ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg', 'gif');
  $gambar = $_FILES['gambar']['name'];
  $x = explode('.', $gambar);
  $ekstensi = strtolower(end($x));
  $ukuran  = $_FILES['gambar']['size'];
  $file_tmp = $_FILES['gambar']['tmp_name'];

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
      move_uploaded_file($file_tmp, 'images/' . $gambar);
      $insert = mysqli_query($koneksi, "INSERT INTO login VALUES ('$id', '$nama', '$username', '$password', '$status', '$jk', '$telp', '$alamat', '$gambar', '$email')");
      if ($insert) {
        header("Location: daftar_akun.php");
        echo 'FILE BERHASIL DI UPLOAD';
      } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
      }
    } else {
      echo 'UKURAN FILE TERLALU BESAR';
    }
  } else {
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
  }
}
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

  <title>Halaman Tambah Akun</title>
</head>

<body>

  <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">Talaman Tambah Akun</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="tambah_akun.php" enctype="multipart/form-data">
        <div class="form-row">
          <!-- <div class="form-group col-md-2">
          <label for="id">Id</label>
          <input type="text" class="form-control" id="id" name="id" readonly>
        </div> -->
          <div class="form-group col-md-6">
            <label for="user">Username</label>
            <input type="text" class="form-control" id="user" name="username" placeholder="Masukan Username" required>
          </div>
          <div class="form-group col-md-6">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="password" placeholder="Masukan Password" required>
          </div>
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required>
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
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required>
          </div>
          <div class="form-group col-md-2">
            <label for="telp">No. Telephone</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telephone" required>
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
          <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email" required>
        </div>
        <div class="form-group">
          <label for="gambar">Foto Akun</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" required>
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>

        <!-- <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
        <button type="reset" class="btn btn-danger" name="reset">Batal</button> -->
        </form? </div>
    </div>
    <!-- Akhir Form Registrasi -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="assets/jquery-1.12.3.min.js"></script>
    <script src="assets/alertify.min.js"></script>
    <!-- <script>
    $(tambah).ready(function(){
      //KONDISI PENGECEKAN ALERTIFY AKAN DILAKUKAN DISINI
    });
    </script> -->
</body>

</html>