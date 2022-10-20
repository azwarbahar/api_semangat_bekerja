<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$outlet_id = $_GET["outlet_id"];
$kunjungan_id = $_GET["kunjungan_id"];
$tanggal = $_GET["tanggal"];

$query = "SELECT * FROM tb_dokumentasi WHERE outlet_id = '$outlet_id' AND
                                        kunjungan_id = '$kunjungan_id' AND
                                        tanggal = '$tanggal'";

// $query = "SELECT * FROM tb_survey_harga";

$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "dokumentasi_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
