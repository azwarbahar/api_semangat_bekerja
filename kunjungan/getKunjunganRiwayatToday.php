<?php

require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);


$sales_id = $_GET["sales_id"];
$tanggal = $_GET["tanggal"];
$waktu = $_GET["waktu"];
if ($waktu == "Bulan") {
    $query = "SELECT * FROM tb_kunjungan WHERE sales_id = '$sales_id' AND
                                                MONTH(tanggal) = MONTH(CURRENT_DATE())";
} else if ($waktu == "Kemarin") {
    $query = "SELECT * FROM tb_kunjungan WHERE sales_id = '$sales_id' AND
                                            DATE(tanggal) = CURDATE() - 1";
} else {
    $query = "SELECT * FROM tb_kunjungan WHERE sales_id = '$sales_id' AND
                                            tanggal = '$tanggal'";
}


$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "kunjungan_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
