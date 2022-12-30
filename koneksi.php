<?php 

$host = "localhost";
$user = "root";
$pass = "12345678";
$db = "db_resku"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

	if (!$koneksi) {
		die("Koneksi Gagal:".mysqli_connect_error());
	}

function response($data, $message, $status_code = 200){
	
		http_response_code($status_code);
		return json_encode(array('data'=>$data,'message'=>$message)); 
};
?>