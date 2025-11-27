<?php
include 'session_check.php';
include "config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$foto = isset($_GET['foto']) ? $_GET['foto'] : '';

if($id){
    if($foto && file_exists("assets/".$foto)){
        @unlink("assets/".$foto);
    }
    $q = mysqli_query($conn, "DELETE FROM objekwisata WHERE id_objek = $id");
    if($q){
        echo "<script>alert('Data berhasil dihapus')</script>";
    } else {
        echo "<script>alert('Gagal menghapus data')</script>";
    }
}
echo "<meta http-equiv='refresh' content='0; url=objek-wisata.php'>";
?>
