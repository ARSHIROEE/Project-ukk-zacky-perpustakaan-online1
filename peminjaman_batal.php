<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE t_peminjaman SET jumlahPinjam = '0', statusPeminjaman = 'dibatalkan' WHERE peminjamanID = $id");

if ($query) {
    $query_update_stok = mysqli_query($koneksi, "UPDATE t_buku JOIN t_peminjaman ON t_buku.bukuID = t_peminjaman.bukuID SET t_buku.stok = t_buku.stok + t_peminjaman.jumlahPinjam WHERE t_peminjaman.peminjamanID = $id");
    if ($query_update_stok) {
        echo "<script>alert('Berhasil Di Batalkan');</script>";
    } else {
        echo "<script>alert('Gagal memperbarui stok buku');<script>";
    }
    echo "<script>location.href = 'index.php?page=peminjaman';</script>";
} else {
    echo "<script>alert('Gagal memperbarui status peminjaman');<script>";
    echo "<script>location.href = 'index.php?page=peminjaman';</script>";
}
?>
