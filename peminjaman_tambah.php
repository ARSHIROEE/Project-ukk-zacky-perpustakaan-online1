<?php
include 'koneksi.php';

if (!isset($_SESSION)) {
    session_start();
}

$bukuID = isset($_GET['bukuID']) ? $_GET['bukuID'] : '';

$query_buku = "SELECT * FROM t_buku WHERE bukuID = $bukuID";
$result_buku = mysqli_query($koneksi, $query_buku);
$buku = mysqli_fetch_assoc($result_buku);

$query_max_kode = "SELECT MAX(SUBSTRING(kodePinjam, 3)) as max_code FROM t_peminjaman";
$result_max_kode = mysqli_query($koneksi, $query_max_kode);
$row_max_kode = mysqli_fetch_assoc($result_max_kode);
$max_kode = $row_max_kode['max_code'];

$new_kode = '';

if ($max_kode == null) {
    $new_kode = 'PM001';
} else {
    $new_kode = 'PM' . str_pad($max_kode + 1, 3, '0', STR_PAD_LEFT);
}

if (isset($_POST['submit'])) {
    // Menghitung total jumlah buku yang sedang dipinjam oleh pengguna
    $userID = $_SESSION['user']['userID'];
    $query_count = "SELECT SUM(jumlahPinjam) as totalPinjam FROM t_peminjaman WHERE userID = $userID";
    $result_count = mysqli_query($koneksi, $query_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $totalPinjam = $row_count['totalPinjam'];

    // Memeriksa apakah pengguna telah meminjam 3 buku atau lebih
    if ($totalPinjam < 3) {
        $kodePinjam = $new_kode;
        $bukuID = $_POST['bukuID'];
        $tgl_peminjaman = date("Y-m-d");
        $tenggat_pengembalian = date("Y-m-d", strtotime('+3 days'));
        $statusPeminjaman = $_POST['statusPeminjaman'];
        $jumlahPinjam = $_POST['jumlahPinjam'];

        $query = mysqli_query($koneksi, "INSERT INTO t_peminjaman(kodePinjam, bukuID, userID, tgl_peminjaman, tenggat_pengembalian, statuspeminjaman, jumlahPinjam) VALUES ('$kodePinjam', '$bukuID', '$userID', '$tgl_peminjaman', '$tenggat_pengembalian', '$statusPeminjaman', '$jumlahPinjam')");

        if ($query) {
            echo '<script>alert("Tambah Data Berhasil.");location.href="?page=peminjaman";</script>';
        } else {
            echo '<script>alert("Tambah Data Gagal.");</script>';
        }
    } else {
        echo '<script>alert("Maaf, Anda hanya dapat meminjam maksimum 3 buku.");history.go(-1);</script>';
    }
}

$query = "SELECT * FROM t_buku";
$result = mysqli_query($koneksi, $query);
?>

<h1 class="mt-4">Form Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="row mb-1">
                        <div class="col-md-2">Kode Pinjam</div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="kodePinjam" value="<?php echo $new_kode; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="bukuID" class="form-control">
                                <?php while ($bukuData = mysqli_fetch_array($result)) : ?>
                                    <option value="<?php echo $bukuData['bukuID']; ?>" <?php echo ($bukuID == $bukuData['bukuID']) ? 'selected' : ''; ?>><?php echo $bukuData['judul']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Jumlah pinjam</div>
                        <div class="col-md-8">
                            <select name="jumlahPinjam" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Tanggal peminjaman</div>
                        <div class="col-md-8"><input type="date" class="form-control" name="tgl_peminjaman" value="<?php echo date('Y-m-d'); ?>" readonly></div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Tenggat Pengembalian</div>
                        <div class="col-md-8"><input type="date" class="form-control" name="tenggat_pengembalian" value="<?php echo date('Y-m-d', strtotime('+3 days')); ?>"></div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select class="form-control" name="statusPeminjaman">
                                <option value="dipinjam">Dipinjam</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
