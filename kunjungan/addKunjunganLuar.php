<?php
require_once '../koneksi.php';
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);

$foto = $_POST['foto'];

$outlet_id = $_POST['outlet_id'];
$sales_id = $_POST['sales_id'];
$status_checkin = $_POST['status_checkin'];
$jam = $_POST['jam'];
$tanggal = $_POST['tanggal'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$masuk_area = $_POST['masuk_area'];
$kendala = $_POST['kendala'];

if ($foto == null) {
    // $finalPath = "../upload/kunjungan/img_default.png";
    $result["kode"] = "2";
    $result["pesan"] = "Foto tidak terkirim!";
    echo json_encode($result);
    mysqli_close($conn);
} else {

    $query = "INSERT INTO tb_kunjungan values(null,'$outlet_id',
                                        '$sales_id',
                                        '$status_checkin',
                                        '$jam',
                                        '$tanggal',
                                        '$latitude',
                                        '$longitude',
                                        '$masuk_area',
                                        '-',
                                        null,
                                        null)";

    if (mysqli_query($conn, $query)) {
        $id = mysqli_insert_id($conn);
        $path = "../upload/kunjungan/image_" . time() . ".png";
        $finalPath = "image_" . time() . ".png";
        //update foto
        $insert_picture = "UPDATE tb_kunjungan SET bukti_foto='$finalPath' WHERE id='$id' ";

        // add kendala
        $query_kendala = "INSERT INTO tb_kendala values(null,'$outlet_id',
                                                    '$sales_id',
                                                    '$id',
                                                    '$jam',
                                                    '$tanggal',
                                                    '$kendala',
                                                    '$finalPath',
                                                    null,
                                                    null)";
        mysqli_query($conn, $query_kendala);


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
