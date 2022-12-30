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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Resku</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Halaman Report</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-6 my-2 my-md-0">
           
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
                            Report
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Report</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                    <a href="daftar_menu.php" class="btn btn-success mt-6">Cetak Laporan</a>
<br><br>
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
                                    <th>Bayar</th>
                                    <th>Kembali</th>
                                    <th>No Meja</th>
                                    </tr>   
                                <?php
                                while ($data = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    echo "<td>" . $data['id'] . "</td>";
                                    echo "<td>" . $data['tanggal'] . "</td>";
                                    echo "<td>" . $data['nama'] . "</td>";
                                    echo "<td>" . $data['total'] . "</td>";
                                    echo "<td>" . $data['bayar'] . "</td>";
                                    echo "<td>" . $data['kembali'] . "</td>";
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
          <p>Apakah anda yakin?</p>
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

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>