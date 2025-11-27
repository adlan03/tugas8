<?php
include 'session_check.php';
include "config.php";

$nama = mysqli_real_escape_string($conn, $_POST['nama_objek']);
$deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

$foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $tipefile = $_FILES['foto']['type'];
    $ukuranfile = $_FILES['foto']['size'];

    if ($tipefile != "image/jpeg" && $tipefile != "image/jpg" && $tipefile != "image/png") {
        echo "<script>alert('Tipe file tidak didukung')</script>";
        echo "<meta http-equiv='refresh' content='0; url=objek-wisata.php'>";
        exit;
    } elseif ($ukuranfile >= 1000000) {
        echo "<script>alert('Ukuran file lebih dari 1 MB')</script>";
        echo "<meta http-equiv='refresh' content='0; url=objek-wisata.php'>";
        exit;
    } else {
        $ext = strrchr($foto, '.');
        $foto = basename($foto, $ext) . time() . $ext;
        move_uploaded_file($lokasi, "assets/" . $foto);
    }
}

// Insert ke database
$sql = "INSERT INTO objekwisata SET
    nama_objek = '$nama',
    deskripsi = '$deskripsi',
    foto = '$foto'
";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>alert('Data objek wisata berhasil disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=objek-wisata.php'>";
} else {
    echo "<script>alert('Gagal menyimpan data')</script>";
    echo mysqli_error($conn);
}
