<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$provider = $_POST['provider'];
$nama_distributor = $_POST['nama_distributor'];
$nilai_distributor = $_POST['nilai_distributor'];
$nilai_server_lain = $_POST['nilai_server_lain'];
$nama_app = $_POST['nama_app'];
$use_app = $_POST['use_app'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$sales_id = $_POST['sales_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$outlet_id = $_POST['outlet_id'];

$query = "INSERT INTO tb_survey_produsen_pulsa values(null, '$provider',
                                        '$nama_distributor',
                                        '$nilai_distributor',
                                        '$nilai_server_lain',
                                        '$nama_app',
                                        '$use_app',
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
