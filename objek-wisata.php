<?php
include 'session_check.php';
// objek-wisata.php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objek Wisata - WebSulSel</title>

    <!-- CSS dashboard umum -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- CSS khusus objek wisata -->
    <link rel="stylesheet" href="assets/objek-wisata.css">
</head>

<body>
    <header>Objek Wisata</header>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="tabel-makanan.php">Makanan Khas</a></li>
                    <li><a href="objek-wisata.php">Objek Wisata</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Konten utama -->
        <section class="content">
            <h1>Daftar Tempat Wisata</h1>

            <!-- TABEL OBJEK WISATA (diambil dari DB) -->
            <?php include "objekwisata_tampil.php"; ?>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

            <!-- FORM TAMBAH OBJEK WISATA -->
            <h2>Tambah Objek Wisata</h2>
            <form action="objekwisata_insert.php" method="post" enctype="multipart/form-data">
                <label for="nama_objek">Nama Objek Wisata:</label>
                <input type="text" id="nama_objek" name="nama_objek" required placeholder="Masukkan nama objek...">

                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi" required placeholder="Masukkan deskripsi singkat...">

                <label for="foto">Gambar (jpg/png, max 1MB):</label>
                <input type="file" id="foto" name="foto">

                <div class="add-button" style="margin-top:12px;">
                    <button type="submit">Simpan</button>
                    <button type="reset">Batal</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>