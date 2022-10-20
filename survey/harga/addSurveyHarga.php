<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$produk_id = $_POST['produk_id'];
$nama_produk = $_POST['nama_produk'];
$provider = $_POST['provider'];
$jenis_produk = $_POST['jenis_produk'];
$harga_modal = $_POST['harga_modal'];
$harga_jual = $_POST['harga_jual'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$sales_id = $_POST['sales_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$outlet_id = $_POST['outlet_id'];

$query = "INSERT INTO tb_survey_harga values(null,'$produk_id',
                                        '$nama_produk',
                                        '$provider',
                                        '$jenis_produk',
                                        '$harga_modal',
                                        '$harga_jual',
                                        '$tanggal',
                                        '$jam',
                                        '$sales_id',
                                        '$kunjungan_id',
                                        '$outlet_id',
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
