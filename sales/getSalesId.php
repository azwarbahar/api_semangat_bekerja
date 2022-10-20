<?php

    require_once '../koneksi.php';
    header('Content-type: application/json');
    error_reporting(E_ERROR | E_PARSE);

    $id = $_GET["id"];
    $query = "SELECT * FROM tb_sales WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $array = $row;
    }

    echo ($result) ?
    json_encode(array("kode" => "1", "result_sales" => $array)) :
    json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));

?>