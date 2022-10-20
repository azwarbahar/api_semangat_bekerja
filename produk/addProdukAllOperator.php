<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$provider = $_POST['provider'];
$nama_produk = $_POST['nama_produk'];
$jenis_produk = $_POST['jenis_produk'];
$harga = $_POST['harga'];
$status = $_POST['status'];

$query = "INSERT INTO tb_produk_all_operator values(null,'$provider',
                                        '$nama_produk',
                                        '$jenis_produk',
                                        '$harga',
                                        '$status',
                                        null,
                                        null)";

if (mysqli_query($conn, $query)) {
    $result["kode"] = "1";
    $result["pesan"] = "Success";
    echo json_encode($result);
    mysqli_close($conn);
} else {
    $response["kode"] = "0";
    $response["pesan"] = "Error! " . mysqli_error($conn);
    echo json_encode($response);
    mysqli_close($conn);
}
