<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$outlet_id = $_POST['outlet_id'];
$sales_id = $_POST['sales_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$jam = $_POST['jam'];
$tanggal = $_POST['tanggal'];
$kendala = $_POST['kendala'];
$foto = $_POST['foto'];

// SET FOTO
$foto = $_FILES['foto']['name'];
$ext = pathinfo($foto, PATHINFO_EXTENSION);
$nama_foto = "image_" . time() . "." . $ext;
$file_tmp = $_FILES['foto']['tmp_name'];


$query = "INSERT INTO tb_kendala values(null, '$outlet_id',
                                        '$sales_id',
                                        '$kunjungan_id',
                                        '$jam',
                                        '$tanggal',
                                        '$kendala',
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
