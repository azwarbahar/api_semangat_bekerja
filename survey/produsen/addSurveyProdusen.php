<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$provider = $_POST['provider'];
$jenis = $_POST['jenis'];
$nama_distributor = $_POST['nama_distributor'];
$nilai_distributor = $_POST['nilai_distributor'];
$broker_sulawesi = $_POST['broker_sulawesi'];
$broker_kalimantan = $_POST['broker_kalimantan'];
$broker_papua_maluku = $_POST['broker_papua_maluku'];
$broker_jawa = $_POST['broker_jawa'];
$broker_bali_ntt = $_POST['broker_bali_ntt'];
$broker_sumatera = $_POST['broker_sumatera'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$sales_id = $_POST['sales_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$outlet_id = $_POST['outlet_id'];

$query = "INSERT INTO tb_survey_produsen values(null, '$provider',
                                        '$jenis',
                                        '$nama_distributor',
                                        '$nilai_distributor',
                                        '$broker_sulawesi',
                                        '$broker_kalimantan',
                                        '$broker_papua_maluku',
                                        '$broker_jawa',
                                        '$broker_bali_ntt',
                                        '$broker_sumatera',
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
