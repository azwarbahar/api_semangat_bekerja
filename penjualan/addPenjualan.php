<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$produk_penjualan_id = $_POST['produk_penjualan_id'];
$nama_produk = $_POST['nama_produk'];
$unit = $_POST['unit'];
$harga_satuan = $_POST['harga_satuan'];
$outlet_id = $_POST['outlet_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$jam = $_POST['jam'];
$tanggal = $_POST['tanggal'];
$sales_id = $_POST['sales_id'];

$query = "INSERT INTO tb_penjualan values(null,'$produk_penjualan_id',
                                        '$nama_produk',
                                        '$unit',
                                        '$harga_satuan',
                                        '$outlet_id',
                                        '$kunjungan_id',
                                        '$jam',
                                        '$tanggal',
                                        '$sales_id',
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
