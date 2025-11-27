<?php
include 'session_check.php';
include 'config.php';

$id = isset($_POST['id_objek']) ? intval($_POST['id_objek']) : 0;
$nama = mysqli_real_escape_string($conn, $_POST['nama_objek'] ?? '');
$deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi'] ?? '');
$fotoLama = $_POST['foto_lama'] ?? '';
$fotoBaru = $fotoLama;

if (!$id) {
    header('Location: objek-wisata.php');
    exit;
}

if (isset($_FILES['foto']) && $_FILES['foto']['name'] !== '') {
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $tipefile = $_FILES['foto']['type'];
    $ukuranfile = $_FILES['foto']['size'];

    if ($tipefile != "image/jpeg" && $tipefile != "image/jpg" && $tipefile != "image/png") {
        echo "<script>alert('Tipe file tidak didukung')</script>";
        echo "<meta http-equiv='refresh' content='0; url=objekwisata_edit.php?id={$id}'>";
        exit;
    } elseif ($ukuranfile >= 1000000) {
        echo "<script>alert('Ukuran file lebih dari 1 MB')</script>";
        echo "<meta http-equiv='refresh' content='0; url=objekwisata_edit.php?id={$id}'>";
        exit;
    } else {
        $ext = strrchr($foto, '.');
        $fotoBaru = basename($foto, $ext) . time() . $ext;

        if (move_uploaded_file($lokasi, "assets/" . $fotoBaru)) {
            if ($fotoLama && file_exists('assets/' . $fotoLama)) {
                @unlink('assets/' . $fotoLama);
            }
        }
    }
}

$sql = "UPDATE objekwisata SET
    nama_objek = '$nama',
    deskripsi = '$deskripsi',
    foto = '$fotoBaru'
    WHERE id_objek = $id";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>alert('Data objek wisata berhasil diperbarui')</script>";
    echo "<meta http-equiv='refresh' content='0; url=objek-wisata.php'>";
} else {
    echo "<script>alert('Gagal memperbarui data')</script>";
    echo mysqli_error($conn);
}
?>
