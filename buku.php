<?php
// Memasukkan file koneksi.php
include 'koneksi.php';

// Memastikan session telah dimulai
if (!isset($_SESSION)) {
    session_start();
}

// Query untuk mengambil data buku
$query = "SELECT * FROM t_buku";
$result = mysqli_query($koneksi, $query);

// Cek apakah query berhasil dieksekusi
if (!$result) {
    die('Error: ' . mysqli_error($koneksi)); // Tampilkan pesan kesalahan jika query gagal
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="body.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<head>
    <style>
            .book-description {
            resize: none; 
            border: none;
            background-color: transparent;
            width: 100%;
            min-height: 100px;
            margin: 0;
            padding: 0;
            overflow:
            font-family: inherit;
            font-size: inherit;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Daftar Buku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semakin banyak membaca semakin banyak yang dibaca!!</li>
        </ol>
        <?php if($_SESSION['user']['level'] == 'admin' || $_SESSION['user']['level'] == 'petugas') { ?>
            <p><a href="index.php?page=buku_tambah" class="btn btn-success">Tambah Buku</a></p>
        <?php } ?>
        <div class="card-container">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="card">
                    <img src="images/<?php echo $row['foto']; ?>" alt="Buku">
                    <div class="card-body">
                        <h3><?php echo $row['judul']; ?></h3>
                        <p><strong>Penulis :</strong> <?php echo $row['penulis']; ?></p>
                        <p><strong>Penerbit :</strong> <?php echo $row['penerbit']; ?></p>
                        <p><strong>Tahun Terbit :</strong> <?php echo $row['tahunTerbit']; ?></p>
                        <p><strong>Stok :</strong> <?php echo $row['stok']; ?></p>
                        <p><textarea class="form-control book-description" rows="3" readonly><?php echo $row['deskripsi']; ?></textarea><br></p>
                        <?php if ($_SESSION['user']['level'] == 'anggota') { ?>
                            <?php if ($row['stok'] > 0) { ?>
                                <a href="index.php?page=peminjaman_tambah&bukuID=<?php echo $row['bukuID']; ?>" class="btn btn-success">Pinjam Buku</a>
                            <?php } else { ?>
                                <span class="btn btn-secondary disabled">Stok Habis</span>
                            <?php } ?>
                            <a href="index.php?page=ulasan_tambah&bukuID=<?php echo $row['bukuID']; ?>" class="btn btn-secondary">Ulasan Buku</a>
                        <?php } else { ?>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="index.php?page=buku_ubah&bukuID=<?php echo $row['bukuID']; ?>" class="btn btn-success">Ubah Buku</a>
                                <a href="index.php?page=buku_hapus&bukuID=<?php echo $row['bukuID']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" class="btn btn-danger">Hapus Buku</a>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
