<?php
include 'session_check.php';
include 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!$id) {
    header('Location: objek-wisata.php');
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM objekwisata WHERE id_objek = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header('Location: objek-wisata.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Objek Wisata</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/objek-wisata.css">
</head>
<body>
    <header>Edit Objek Wisata</header>
    <div class="container">
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

        <section class="content">
            <h1>Edit Data Objek Wisata</h1>
            <form action="objekwisata_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_objek" value="<?= $data['id_objek']; ?>">
                <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

                <label for="nama_objek">Nama Objek Wisata:</label>
                <input type="text" id="nama_objek" name="nama_objek" required value="<?= htmlspecialchars($data['nama_objek']); ?>">

                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi" required value="<?= htmlspecialchars($data['deskripsi']); ?>">

                <label>Gambar Saat Ini:</label>
                <div style="margin-bottom:12px;">
                    <?php if($data['foto'] && file_exists('assets/'.$data['foto'])): ?>
                        <img src="assets/<?= $data['foto']; ?>" alt="<?= $data['nama_objek']; ?>" style="max-width:160px;">
                    <?php else: ?>
                        <img src="assets/no-image.png" alt="no image" style="max-width:160px;">
                    <?php endif; ?>
                </div>

                <label for="foto">Ganti Gambar (opsional):</label>
                <input type="file" id="foto" name="foto">

                <div class="add-button" style="margin-top:12px;">
                    <button type="submit">Perbarui</button>
                    <a class="btn-detail" href="objek-wisata.php" style="text-decoration:none;">Batal</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
