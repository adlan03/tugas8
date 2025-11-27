<?php
include 'session_check.php';
include "config.php";

$query = mysqli_query($conn, "SELECT * FROM objekwisata ORDER BY id_objek DESC");
?>

<div class="table-box">
    <table>
        <thead>
            <tr>
                <th style="width:5%;">No</th>
                <th style="width:25%;">Nama Objek Wisata</th>
                <th style="width:20%;">Gambar</th>
                <th style="width:40%;">Deskripsi</th>
                <th style="width:10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            while($data = mysqli_fetch_array($query)){
                $no++;
            ?>
            <tr>
                <td class="no"><?php echo $no; ?></td>
                <td><?php echo $data['nama_objek']; ?></td>
                <td>
                    <?php if($data['foto'] && file_exists("assets/".$data['foto'])): ?>
                        <img src="assets/<?php echo $data['foto']; ?>" alt="<?php echo $data['nama_objek']; ?>">
                    <?php else: ?>
                        <img src="assets/no-image.png" alt="no image">
                    <?php endif; ?>
                </td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td class="aksi">
                    <a class="btn-detail" href="objekwisata_edit.php?id=<?php echo $data['id_objek']; ?>">Edit</a>
                    <a class="btn-detail" onclick="return confirm('Yakin ingin menghapus?')" href="objekwisata_hapus.php?id=<?php echo $data['id_objek']; ?>&foto=<?php echo $data['foto']; ?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
