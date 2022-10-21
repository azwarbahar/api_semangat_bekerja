<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

// $foto = $_POST['foto'];

$jenis_dokumentasi = $_POST['jenis_dokumentasi'];
$urutan = $_POST['urutan'];
$outlet_id = $_POST['outlet_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$sales_id = $_POST['sales_id'];
// $nama_foto = "-";
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];


// SET FOTO
$foto = $_FILES['foto']['name'];
$ext = pathinfo($foto, PATHINFO_EXTENSION);
$nama_foto = "image_" . time() . "." . $ext;
$file_tmp = $_FILES['foto']['tmp_name'];


$query = "INSERT INTO tb_dokumentasi values(null, '$jenis_dokumentasi',
                                        '$urutan',
                                        '$outlet_id',
                                        '$kunjungan_id',
                                        '$sales_id',
                                        '$nama_foto',
                                        '$tanggal',
                                        '$jam',
                                        null,
                                        null)";

if (mysqli_query($conn, $query)) {

    move_uploaded_file($file_tmp, '../upload/dokumentasi/' . $nama_foto);

    $result["kode"] = "1";
    $result["pesan"] = "Success!";

    echo json_encode($result);
    mysqli_close($conn);
} else {
    $response["kode"] = "0";
    $response["pesan"] = "Error! " . mysqli_error($conn);
    echo json_encode($response);
    mysqli_close($conn);
}
