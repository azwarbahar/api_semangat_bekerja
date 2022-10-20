<?php

 require_once 'koneksi.php';
 header('Content-type: application/json');

 $username = $_GET["username"];
 $password = $_GET["password"];
 $ray = array();
 $query_sales = "SELECT * FROM tb_sales WHERE username ='$username'";
 $sql_sales = mysqli_query($conn, $query_sales);
 $row_pass_sales = mysqli_fetch_assoc($sql_sales);
 if ($row_pass_sales){
    if (password_verify($password, $row_pass_sales["password"])) {
        $ray=$row_pass_sales;
        echo json_encode(array("kode" => "1", "pesan" => "Login Berhasil", "data" => $ray));
    } else{
        echo json_encode(array("kode" => "2", "pesan" => "Password tidak sesuai"));
    }
 } else {
    echo json_encode(array("kode" => "0", "pesan" => "Respon Tidak ada"));
 }

?>