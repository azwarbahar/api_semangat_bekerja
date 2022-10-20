<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$produk_id = $_POST['produk_id'];
$provider = $_POST['provider'];
$nama_produk = $_POST['nama_produk'];
$jenis_produk = $_POST['jenis_produk'];
$jumlah_produk = $_POST['jumlah_produk'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$sales_id = $_POST['sales_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$outlet_id = $_POST['outlet_id'];

$query = "INSERT INTO tb_survey_stok values(null,'$produk_id',
                                        '$provider',
                                        '$nama_produk',
                                        '$jenis_produk',
                                        '$jumlah_produk',
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
