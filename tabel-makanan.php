<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Makanan Khas Sulawesi Selatan</title> 
    <link rel="stylesheet" href="assets/style.css"> 
</head> 
<body> 
    <header> 
        Makanan Khas 
    </header> 
 
    <div class="container"> 
        <!-- Sidebar --> 
        <aside class="sidebar"> 
            <nav> 
                <ul> 
                    <li><a href=#>Dashboard</a></li> 
                    <li><a href="tabel-makanan.php">Makanan Khas</a></li> 
                    <li><a href="objek-wisata.php">Objek Wisata</a></li> 
                    <li><a href=#>Keluar</a></li> 
                </ul> 
            </nav> 
        </aside> 
 
        <!-- Konten Utama --> 
        <section class="content"> 
            <h1>Daftar Makanan Khas Sulawesi Selatan</h1>       
     
            <!-- Formulir Tambah Makanan --> 
            <form id="food-form" action="makanan_insert.php" method="post" 
enctype="multipart/form-data"> 
            <h2>Tambah Makanan Khas</h2> 
            <label for="food-name">Nama Makanan:</label> 
            <input type="text" id="nama_makanan" name="nama_makanan" placeholder="Masukkan 
nama makanan..."  
            required oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')" 
oninput="setCustomValidity('')"> 
             
            <label for="food-desc">Deskripsi Makanan:</label> 
            <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi 
makanan..."  
            required oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')" 
oninput="setCustomValidity('')"> 
             
            <label for="food-image">Gambar Makanan:</label> 
            <input type="file" id="foto" name="foto"> 
             

            <div class="add-button"> 
                <button type="submit" id="submit-btn">Simpan</button> 
                <button type="reset">Batal</button> 
            </div> 
 
            </form> 
 
            <!-- Tabel Data Makanan --> 
            <?php  
                include "makanan_tampil.php"; 
            ?> 
 
        </section> 
    </div> 
</body> 
</html> 
