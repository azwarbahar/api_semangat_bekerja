<?php

require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$jenis_dokumentasi = $_GET["jenis_dokumentasi"];
$urutan = $_GET["urutan"];
$outlet_id = $_GET["outlet_id"];
$kunjungan_id = $_GET["kunjungan_id"];
$tanggal = $_GET["tanggal"];

$query = "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = '$jenis_dokumentasi' AND 
                                            urutan = '$urutan' AND
                                            outlet_id = '$outlet_id' AND
                                            kunjungan_id = '$kunjungan_id' AND
                                            tanggal = '$tanggal'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "result_dokumentasi" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
