

<?php 
include 'koneksi.php';
  if(isset($_POST['tambah'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    
    $insert = mysqli_query($koneksi, "INSERT INTO pengunjung VALUES ('$id', '$nama')");

    if($insert){
      header("location: detail_pesanan.php");
    }
    else {
      echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
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
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <title>Halaman Pengunjung</title>
  </head>
  <body>
  <!-- Form Login --> 
  
    <div class="container ">
      <h4 class="text-center">Silahkan isikan nama...</h4>
      <img src="images/login.png" class="card-img-center" width="360" height="280" alt="...">
      <h4 class="text-center">Log-In</h4>
      <hr>
      <form method="POST" action="menu_pembeli.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Id</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" class="form-control" placeholder="Masukkan id" name="id">
            </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nama</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
              </div>
              <input type="password" class="form-control" placeholder="Masukkan nama" name="nama">
          </div>
        </div>
        <!-- <div class="mb-3" >
          <small><a href="register.php" class="text-dark">Belum Punya Akun ? Buat Akun Anda !</a></small>
        </div> -->
        <center>  
        <button  type="submit" name="submit" class="btn btn-primary" name="tambah">LOGIN</button>
      </center>
        <!-- <button type="reset" name="reset" class="btn btn-danger">RESET</button> -->
      </form>
  <!-- Akhir Form Login -->

    </div>
    <br><br>
  <!-- Akhir Eksekusi Form Login -->







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>