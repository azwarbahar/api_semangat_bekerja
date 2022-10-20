<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$foto = $_POST['foto'];

$jenis_dokumentasi = $_POST['jenis_dokumentasi'];
$urutan = $_POST['urutan'];
$outlet_id = $_POST['outlet_id'];
$kunjungan_id = $_POST['kunjungan_id'];
$sales_id = $_POST['sales_id'];
$nama_foto = "-";
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];


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
    if ($foto == null) {
        $finalPath = "../upload/dokumentasi/img_default.png";
        $result["kode"] = "1";
        $result["pesan"] = "Success";
        echo json_encode($result);
        mysqli_close($conn);
    } else {

        $id = mysqli_insert_id($conn);
        $path = "../upload/dokumentasi/image_" . time() . ".png";
        $finalPath = "image_" . time() . ".png";

        $insert_picture = "UPDATE tb_dokumentasi SET nama_foto='$finalPath' WHERE id='$id' ";

        if (mysqli_query($conn, $insert_picture)) {

            if (file_put_contents($path, base64_decode($foto))) {

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
        }
    }
} else {
    $response["kode"] = "0";
    $response["pesan"] = "Error! " . mysqli_error($conn);
    echo json_encode($response);
    mysqli_close($conn);
}
