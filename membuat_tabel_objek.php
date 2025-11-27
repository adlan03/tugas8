<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_websulsel";

// Koneksi ke server MySQL
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(mysqli_connect_errno()){
    echo "Koneksi gagal: ".mysqli_connect_error();
    exit;
}

// Pastikan database ada
$sqlDb = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($conn, $sqlDb);

// Koneksi ke database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()){
    echo "Koneksi ke database gagal: ".mysqli_connect_error();
    exit;
}

// Membuat tabel objekwisata TANPA memasukkan sample data
$sql = "CREATE TABLE IF NOT EXISTS objekwisata (
    id_objek INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_objek VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    foto VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if(mysqli_query($conn, $sql)){
    echo "Tabel 'objekwisata' berhasil";
} else {
    echo "Gagal membuat tabel: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>
