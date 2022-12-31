<?php 
// koneksi
include "koneksi.php";

if (isset($_POST['submit'])) {
 $bln = date($_POST['bulan']);

 if (!empty($bln)) {
  // perintah tampil data berdasarkan periode bulan
  $q = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE MONTH(tanggal) = '$bln'");
 } else {
  // perintah tampil semua data
  $q = mysqli_query($koneksi, "SELECT * FROM transaksi");
 }
} else {
 // perintah tampil semua data
 $q = mysqli_query($koneksi, "SELECT * FROM transaksi");
}

// hitung jumlah baris data
$s = $q->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link href="images/resku.png" rel="icon">
  <title>Halaman Laporan</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


</head>
<body>
    <br>
    <br>
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <center>
                <div class="sidebar-brand-icon">
                    <img src="images/resku.png" width="45" height="45">
                </div>
            </center>

            <!-- <div class="sidebar-brand-text mx-3">Resku</div> -->
        </a>
        <a class="navbar-brand ps-3" href="index.html">Restoranku</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-2 my-2 my-md-0">
        <a class="btn btn-light btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
        </form>
        <!-- Navbar-->

    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="daftar_menu.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                            Menu
                        </a>

                        <a class="nav-link" href="daftar_akun.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                            Akun
                        </a>

                        <a class="nav-link" href="report.php">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div> -->
                            Laporan Penjualan
                        </a>

                        <!-- <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a> -->


                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>




                <div class="container-fluid px-2">
                    <h1>Laporan Penjualan</h1>
                    <br>

                    <div class="col-md-12">
      <form method="POST" action="" class="form-inline">
   
       <label for="date1">Tampilkan transaksi bulan </label>
       <select class="form-control mr-2" name="bulan">
        <option value="">-</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
       </select>
       <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
       <a href="laporan.php" class="btn btn-success ml-2 mt-6">Cetak Laporan</a>
      </form>
     </div>
     <br>
      <!-- <div class="row mt-4">
      <div class="col">
        <form action="report.php" method="get">
            <input type="date" name="tgl_mulai">-
            <input type="date" name="tgl_selesai">
            <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
        </form>
      </div>
      </div>
      <br> -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Laporan Penjualan
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Id</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Checkout</th>
                                    <th>Validasi</th>
                                    <th>No Meja</th>
                                </tr>
                                <?php

                                while ($data = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    echo "<td>" . $data['id'] . "</td>";
                                    echo "<td>" . $data['tanggal'] . "</td>";
                                    echo "<td>" . $data['nama'] . "</td>";
                                    echo "<td>" . $data['total'] . "</td>";
                                    echo "<td>" . $data['checkout'] . "</td>";
                                    echo "<td>" . $data['valid'] . "</td>";
                                    echo "<td>" . $data['no_meja'] . "</td>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                            <p>Apakah anda yakin akan logout?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                <a href="login.php" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Awal Footer -->
                <hr class="footer">
                <div class="container">
                    <div class="row footer-body">
                        <div class="col-md-6  ">
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
                <script src="js/scripts.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                <script src="assets/demo/chart-area-demo.js"></script>
                <script src="assets/demo/chart-bar-demo.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                <script src="js/datatables-simple-demo.js"></script>
</body>

</html>