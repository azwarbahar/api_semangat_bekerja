<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);
$salesforce = $_GET["salesforce"];
$query = "SELECT * FROM tb_outlet WHERE salesforce = '$salesforce'";

$result = mysqli_query($conn, $query);

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
   $array[] = $row;
}

echo ($result) ?
   json_encode(array("kode" => "1", "outlet_data" => $array)) :
   json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
