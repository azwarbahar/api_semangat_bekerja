<?php

require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$sales_id = $_GET["sales_id"];
$tanggal = $_GET["tanggal"];
$status_checkin = "Checkin";

$query = "SELECT * FROM tb_kunjungan WHERE sales_id = '$sales_id' AND status_checkin = '$status_checkin' AND tanggal = '$tanggal'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "result_kunjungan" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
