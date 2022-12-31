

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'koneksi.php';
if (isset($_POST['tambah'])) {
    $id = '';
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];


    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg', 'gif');
    $gambar = $_FILES['gambar']['name'];
    echo $gambar;
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'images/' . $gambar);
            try {
                $insert = $koneksi->query("INSERT INTO `menu`(`gambar`, `nama`, `harga`) VALUES ('$gambar', '$nama', '$harga')");
                print_r($insert);
                new Exception("eror");
                if ($insert) {
                    header("Location: daftar_menu.php");
                    echo 'FILE BERHASIL DI UPLOAD';
                } else {
                    print_r($insert);
                    echo 'GAGAL MENGUPLOAD GAMBAR';
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
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