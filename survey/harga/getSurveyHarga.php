<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$tanggal = $_GET["tanggal"];
// $kunjungan_id = $_GET["kunjungan_id"];
$outlet_id = $_GET["outlet_id"];

$query = "SELECT * FROM tb_survey_harga WHERE outlet_id = '$outlet_id' AND
                                            tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW() ";

$result = mysqli_query($conn, $query);

// $array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "harga_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
