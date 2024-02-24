<?php
include 'koneksi.php';

if(isset($_GET['bukuID'])){
    $bukuID = $_GET['bukuID'];

    $query_status = "SELECT statusPeminjaman FROM t_peminjaman WHERE bukuID = $bukuID AND statusPeminjaman = 'dipinjam'";
    $result_status = mysqli_query($koneksi, $query_status);

    if(mysqli_num_rows($result_status) > 0) {
        echo '<script>alert("Buku sedang dipinjam dan tidak dapat dihapus."); history.go(-1);</script>';
    } else {
        $query_delete = mysqli_query($koneksi, "DELETE FROM t_buku WHERE bukuID = $bukuID");
        if($query_delete){
            echo '<script>alert("Hapus data berhasil");location.href="index.php?page=buku";</script>';
        } else {
            echo '<script>alert("Gagal menghapus data");history.go(-1);</script>';
        }
    }
} else {
    echo "Buku ID tidak ditemukan.";
}
?>
