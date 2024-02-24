<?php
include 'koneksi.php';

if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit;
}

$id = isset($_GET['bukuID']) ? $_GET['bukuID'] : null;

if($id === null) {
    echo '<script>alert("ID tidak ditemukan");location.href="index.php?page=buku";</script>';
    exit;
}

$query = mysqli_query($koneksi,"SELECT * FROM t_buku where bukuID=$id");

if(mysqli_num_rows($query) == 0) {
    echo '<script>alert("Buku tidak ditemukan");location.href="index.php?page=buku";</script>';
    exit;
}

$data = mysqli_fetch_array($query);

if(isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunTerbit'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];

    // Memeriksa apakah ada field yang kosong
    if(empty($judul) || empty($penulis) || empty($penerbit) || empty($tahunTerbit) || empty($deskripsi) || empty($stok)) {
        echo '<script>alert("Semua field harus di isi");location.href="index.php?page=buku_ubah&bukuID=' . $id . '";</script>';
    } else {
        // Memeriksa apakah ada file foto yang diunggah
        if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
            // Proses upload foto baru
            $nama_file = $_FILES['foto']['name'];
            $tmp_file = $_FILES['foto']['tmp_name'];
            $path = "images/" . $nama_file;

            if(move_uploaded_file($tmp_file, $path)) {
                // Jika upload berhasil, perbarui kolom foto di database
                $query_update_foto = mysqli_query($koneksi, "UPDATE t_buku SET foto='$nama_file' WHERE bukuID=$id");
                if(!$query_update_foto) {
                    echo '<script>alert("Maaf, terjadi kesalahan saat mengupdate foto di database");</script>';
                }
            } else {
                echo '<script>alert("Maaf, terjadi kesalahan saat mengupload foto");</script>';
            }
        }

        // Update data buku (termasuk jika tidak ada file foto yang diunggah)
        $query_update_buku = mysqli_query($koneksi,"UPDATE t_buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunTerbit='$tahunTerbit', deskripsi='$deskripsi', stok='$stok' WHERE bukuID=$id");
        if($query_update_buku){
            echo '<script>alert("Selamat, data berhasil diubah");location.href="index.php?page=buku";</script>';
        } else {
            echo '<script>alert("Maaf, terjadi kesalahan saat mengupdate data buku");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Buku</title>
</head>
<body>
    <h1 class="mt-4">Ubah Data Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="buku_ubah.php?bukuID=<?php echo $id; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="bukuID" value="<?php echo $id; ?>">
                        <!-- Sisipkan juga bukuID di dalam aksi formulir untuk memastikan data tersebut terkirim -->
                        <div class="row mb-3">
                            <div class="col-md-2">Ubah Foto</div>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Judul</div>
                            <div class="col-md-8"><input type="text" value="<?php echo $data['judul'];?>" class="form-control" name="judul"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penulis</div>
                            <div class="col-md-8"><input type="text" value="<?php echo $data['penulis'];?>" class="form-control" name="penulis"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penerbit</div>
                            <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit'];?>" class="form-control" name="penerbit"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tahun Terbit</div>
                            <div class="col-md-8"><input type="number" value="<?php echo $data['tahunTerbit'];?>" class="form-control" name="tahunTerbit"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Stok</div>
                            <div class="col-md-8"><input type="number" value="<?php echo $data['stok'];?>" class="form-control" name="stok"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Deskripsi</div>
                            <div class="col-md-8">
                                <textarea name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi'];?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                <a href="?page=buku" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
