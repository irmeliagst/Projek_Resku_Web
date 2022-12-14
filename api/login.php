<?php
 $db = mysqli_connect('localhost','root','','tokoonline');
 $id_user = $_POST['username'];
 $password = md5($_POST['password']);
// <<<<<<< HEAD
//  $sql = "SELECT * FROM user WHERE username = '$id_user' ";
//  $result = mysqli_query($db,$sql);

//  if(mysqli_num_rows($result) == 1){
//    $userRecord=array();
//     while ($rowFound = mysqli_fetch_assoc($result)){
//         $userRecord[]=$rowFound;
//    }
//    http_response_code(200);
//    echo json_encode(
//     array(
         
//         "success" => true, 
//         "message" => "Login berhasil",
//         "user" => $userRecord[0],
        
//     )
//     );
// =======
 
 if(!$id_user) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Masukan username anda",
        "data" => null,
    ]);

    exit;
 }
 
 $sql = "SELECT * FROM akun WHERE username = '$id_user' && id_user = '1' ";
 $result = mysqli_query($db,$sql);

 if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $passwordVal = $row["password"];

    if(md5($passwordVal) != $password) {
        http_response_code(404);
        $response =  json_encode([
            "success" => false,
            "message" => "Password anda salah",
            "data" => null,
        ]);

        echo $response;
    } else {
        http_response_code(200);
        echo json_encode(
            array(
                "success" => true, 
                "message" => "Login berhasil",
                "user" => $row
            )
        );
    }
 } 
 else{
    http_response_code(404);
 	echo json_encode([
        "success" => false,
        "message" => "Akun tidak ditemukan",
        "data" => null
    ]);
 }
?>