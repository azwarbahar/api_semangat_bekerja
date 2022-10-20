<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$no_branding = $_POST['no_branding'];
$nama = $_POST['nama'];
$provider = $_POST['provider'];
$tersedia = $_POST['tersedia'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$sales_id = $_POST['sales_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$outlet_id = $_POST['outlet_id'];

$query = "INSERT INTO tb_survey_branding values(null,'$no_branding',
                                        '$nama',
                                        '$provider',
                                        '$tersedia',
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
