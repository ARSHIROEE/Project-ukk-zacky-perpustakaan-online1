<?php
include 'koneksi.php';

if(isset($_GET['peminjamanID'])){
    $peminjamanID = $_GET['peminjamanID'];

    $tgl_pengembalian = date('Y-m-d');
    $query = mysqli_query($koneksi, "UPDATE t_peminjaman SET statusPeminjaman = 'dikembalikan', tgl_pengembalian = '$tgl_pengembalian', jumlahPinjam = '0' WHERE peminjamanID = $peminjamanID");

    if($query){
        header(header("Location:index.php?page=laporan"));
        exit();
    } else {
        echo "Gagal melakukan pengembalian buku.";
    }
} else {
    echo "Peminjaman ID tidak ditemukan.";
}
?>
