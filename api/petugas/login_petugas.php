<?php
 require('../../koneksi.php');
 $username = $_POST['username'];
 $password = $_POST['password'];
 $data =array();
 $result = mysqli_query($koneksi, "select * from login WHERE username='$username' and password='$password'");
 while($rowdata = mysqli_fetch_array($result)){
  $data[]=$rowdata;
 }
 echo json_encode($data);
//  if ($result) {
//    $result = mysqli_fetch_assoc($result);
//       $data = array(
//         'username' => $result['username'],
//         'password' => $result['password'],
//       );


//     }
    ?>


<?php
// require('../../koneksi.php');
// // $koneksi = new mysqli("localhost", "root", "12345678", "db_resku");
// $username = $_POST['username'];
// $password = $_POST['password'];
// // $level = $_POST['level'];
// $username = isset($_POST['username']);
// $password = isset($_POST['password']);

// $queryResult=$conn->query("SELECT * FROM login Where username='".$username."' and password='".$password."'");

// $result=array();

// while($fetchData=$queryResult->fetch_assoc()){
//     $result[]=$fetchData;
// }
// $result = $conn->query("SELECT * from login");
//  if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        $data[] = $row;
//    }
//  }
?>
<?php
// require('../../koneksi.php');
// // $koneksi = new mysqli("localhost", "root", "", "kub");
// $username = $_POST['username'];
// $password = $_POST['password'];
// $data = array();
// $queryResult=mysqli_query($koneksi, "SELECT * FROM login WHERE username='".$username."' and password='".$password."'");
// while($rowdata = mysqli_fetch_array($queryResult)){
//     $data[]=$rowdata;
// }
// echo json_encode($data);
// $queryResult=$connect->query("SELECT * FROM login WHERE username='$username' and password='$password'");
// if ($queryResult) {
//     echo json_encode("Sukses");
// } else {
//     echo json_encode("Gagal");
// }
// $result=array();
// while($fetchData=$queryResult->fetch_assoc()){
//     $result[]=$fetchData;
// }

// $query = "SELECT * FROM login Where username='".$username."' and password='".$password."'";
// // $query = "SELECT * FROM akun join detail_akun on akun.id = detail_akun.level WHERE email='$email'";
// $result = mysqli_query($conn,$query);

// if ($result->num_rows>0){
//     while ($row=$result->fetch_assoc($result)){
//         $data[]=$row;
//     }
// }

// while($row = mysqli_fetch_array($result)){
//     $result[] = $row;
// }

// echo json_encode($result);
// if(mysqli_num_rows($result) == 1){
//     $row = mysqli_fetch_assoc($result);
//     $passwordVal = $row["password"];

//     if(md5($passwordVal) != $password) {
//         http_response_code(404);
//         $response =  json_encode([
//             "success" => false,
//             "message" => "Password anda salah",
//             "data" => null,
//         ]);

//         echo $response;
//     } else {
//         http_response_code(200);
//         echo json_encode(
//             array(
//                 "success" => true, 
//                 "message" => "Login berhasil",
//                 "user" => $row
//             )
//         );
//     }
//  } 
//  else{
//     http_response_code(404);
//  	echo json_encode([
//         "success" => false,
//         "message" => "Akun tidak ditemukan",
//         "data" => null
//     ]);
//  }
//  require('../../koneksi.php');
// // $connect = new mysqli("localhost", "root", "", "kub");
// $username = isset($_POST['username']);
// $password = isset($_POST['password']);
// $query= ("SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");
// $result = mysqli_query($koneksi, $query);
// $num = mysqli_num_rows($result);

// if ($num == 0){
//     echo json_encode("Success");
// } else {
//     echo json_encode("Error");
// }
?>