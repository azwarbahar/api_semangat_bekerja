<?php

require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$outlet_id = $_GET["outlet_id"];
$sales_id = $_GET["sales_id"];
// $status_checkin = $_GET["status_checkin"];
$tanggal = $_GET["tanggal"];

// status_checkin = '$status_checkin' AND

$query = "SELECT * FROM tb_kunjungan WHERE outlet_id = '$outlet_id' AND 
                                            sales_id = '$sales_id' AND
                                            tanggal = '$tanggal'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "result_kunjungan" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
