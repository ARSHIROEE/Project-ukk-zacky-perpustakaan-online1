<?php
include 'koneksi.php';

$id = isset($_POST['bukuID']) ? $_POST['bukuID'] : null;

if($id === null) {
    echo '<script>alert("ID tidak ditemukan");location.href="index.php?page=buku";</script>';
    exit;
}

// Debug: Periksa apakah ID buku terbaca dengan benar
echo "ID Buku: " . $id . "<br>";

// Proses upload foto jika ada
if(isset($_FILES['foto'])) {
    $nama_file = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    
    // Debug: Periksa informasi file yang diunggah
    echo "Nama File: " . $nama_file . "<br>";
    echo "Temp File: " . $tmp_file . "<br>";

    // Lokasi penyimpanan foto di direktori images
    $path = "images/" . $nama_file;

    // Debug: Periksa path penyimpanan foto
    echo "Path: " . $path . "<br>";

    // Cek apakah file berhasil diupload
    if(move_uploaded_file($tmp_file, $path)) {
        // Update data buku dengan foto baru
        $query_update_foto = mysqli_query($koneksi, "UPDATE t_buku SET foto='$nama_file' WHERE bukuID=$id");
        
        if($query_update_foto){
            echo '<script>alert("Foto berhasil diubah");</script>';
        } else {
            echo '<script>alert("Maaf, terjadi kesalahan saat mengupdate foto di database: ' . mysqli_error($koneksi) . '");</script>';
        }
    } else {
        echo '<script>alert("Maaf, terjadi kesalahan saat mengupload foto");</script>';
    }
} else {
    // Jika tidak ada foto yang diupload, langsung redirect kembali ke halaman buku
    header('location: index.php?page=buku');
    exit;
}
?>
