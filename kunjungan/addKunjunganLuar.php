<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

// $foto = $_POST['foto'];

$outlet_id = $_POST['outlet_id'];
$sales_id = $_POST['sales_id'];
$status_checkin = $_POST['status_checkin'];
$jam = $_POST['jam'];
$tanggal = $_POST['tanggal'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$masuk_area = $_POST['masuk_area'];
$kendala = $_POST['kendala'];

// SET FOTO
$foto = $_FILES['foto']['name'];
$ext = pathinfo($foto, PATHINFO_EXTENSION);
$nama_foto = "image_" . time() . "." . $ext;
$file_tmp = $_FILES['foto']['tmp_name'];

$query = "INSERT INTO tb_kunjungan values(null,'$outlet_id',
                                        '$sales_id',
                                        '$status_checkin',
                                        '$jam',
                                        '$tanggal',
                                        '$latitude',
                                        '$longitude',
                                        '$masuk_area',
                                        '$nama_foto',
                                        null,
                                        null)";

if (mysqli_query($conn, $query)) {
    move_uploaded_file($file_tmp, '../upload/kunjungan/' . $nama_foto);

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
