<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$outlet_id = $_GET["outlet_id"];
$kunjungan_id = $_GET["kunjungan_id"];
$tanggal = $_GET["tanggal"];
$sales_id = $_GET["sales_id"];


$query = "SELECT * FROM tb_penjualan WHERE outlet_id = '$outlet_id' AND kunjungan_id = '$kunjungan_id' AND
                        tanggal = '$tanggal' AND sales_id = '$sales_id' ORDER BY id DESC";

$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "penjualan_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
