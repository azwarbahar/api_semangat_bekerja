<?php
require_once '../../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$provider = $_GET["provider"];
$tanggal = $_GET["tanggal"];
$kunjungan_id = $_GET["kunjungan_id"];
$outlet_id = $_GET["outlet_id"];

$query = "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$provider' AND
                                        tanggal = '$tanggal' AND
                                        kunjungan_id = '$kunjungan_id' AND
                                        outlet_id = '$outlet_id'";

// $query = "SELECT * FROM tb_survey_harga";

$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "produsen_pulsa_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
