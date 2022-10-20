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

if ($foto == null) {
    // $finalPath = "../upload/dokumentasi/img_default.png";
    $result["kode"] = "2";
    $result["pesan"] = "Foto tidak terkirim!";
    echo json_encode($result);
    mysqli_close($conn);
} else {

    $query = "INSERT INTO tb_kendala values(null, '$outlet_id',
                                        '$sales_id',
                                        '$kunjungan_id',
                                        '$jam',
                                        '$tanggal',
                                        '$kendala',
                                        '-',
                                        null,
                                        null)";

    if (mysqli_query($conn, $query)) {
        $id = mysqli_insert_id($conn);
        $path = "../upload/kunjungan/image_" . time() . ".png";
        $finalPath = "image_" . time() . ".png";

        $insert_picture = "UPDATE tb_kendala SET bukti_foto='$finalPath' WHERE id='$id' ";

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
    } else {
        $response["kode"] = "0";
        $response["pesan"] = "Error! " . mysqli_error($conn);
        echo json_encode($response);
        mysqli_close($conn);
    }
}
