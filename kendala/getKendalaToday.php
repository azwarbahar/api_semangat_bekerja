<?php

require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$outlet_id = $_GET["outlet_id"];
$sales_id = $_GET["sales_id"];
$kunjungan_id = $_GET["kunjungan_id"];
// $status_checkin = $_GET["status_checkin"];
$tanggal = $_GET["tanggal"];

// status_checkin = '$status_checkin' AND

$query = "SELECT * FROM tb_kendala WHERE outlet_id = '$outlet_id' AND 
                                            sales_id = '$sales_id' AND
                                            kunjungan_id = '$kunjungan_id' AND
                                            tanggal = '$tanggal' AND
                                            kendala NOT IN ('Checkin dengan posisi luar radius outlet')";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "result_kendala" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
