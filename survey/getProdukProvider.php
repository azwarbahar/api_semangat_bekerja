<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$provider = $_GET["provider"];
$jenis_produk = $_GET["jenis_produk"];

$query = "SELECT * FROM tb_produk_all_operator WHERE provider = '$provider' AND 
                                                    jenis_produk = '$jenis_produk' AND
                                                    status = 'Active' ORDER BY id ASC";

$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo ($result) ?
    json_encode(array("kode" => "1", "produk_provider_data" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
