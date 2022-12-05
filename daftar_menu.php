<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

  <title>Halaman Menu</title>
</head>

<body>
  <br>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  bg-dark">
    <div class="container">
      <a class="navbar-brand text-white" href="index.html"><strong>Halaman Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4" href="daftar_menu.php">MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="daftar_akun.php">AKUN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="report.php">REPORT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="login.php">LOGOUT</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <h1 class="display-4"><span class="font-weight-bold">RESTORANKU</span></h1>
      <hr>
      <p class="lead font-weight-bold">Silahkan Pesan Menu Sesuai Keinginan Anda <br>
        Enjoy Your Meal</p>
    </div>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Menu -->
 
  <div class="container">
    <a href="tambah_menu.php" class="btn btn-success mt-6">Tambah Menu</a>
    <div class="row mt-9">
      <?php
      require('koneksi.php');
      $result = $koneksi->query('select * from menu');
      while ($data = mysqli_fetch_assoc($result)) { ?>
       <br><br>
        <div class="col-md-3">
          <br><br>
          <div class="card border-dark">
            <img src="images/<?=$data['gambar']?>" class="card-img-top" alt="..." width="200" height="260">
            <div class="card-body">
              <h5 class="card-title font-weight-bold"><?= $data['nama'] ?></h5>
              <label class="card-text harga">Rp. <?= $data['harga'] ?></label><br>
              <a href="#" class="btn btn-primary btn-sm">EDIT</a>
              <a href="#" class="btn btn-danger btn-sm">HAPUS</a>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
 
  <!-- Akhir Menu -->

  <!-- Awal Footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <div class="copyright">
          <strong>Copyright</strong> <i class="far fa-copyright"></i> 2022 - Restoranku</p>
        </div>
      </div>

      <div class="col-md-6 d-flex justify-content-end">
        <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Footer -->





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.js"></script>
</body>

</html>