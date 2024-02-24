<?php
include 'koneksi.php';
    
if(!isset($_SESSION['user'])){
    header('location:login.php');
}
?>

<h1 class="mt-4">Peminjaman</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjam</th> <!-- Tambah kolom Kode Pinjam -->
                        <th>User</th>
                        <th>Buku</th>
                        <th>Nominal Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>tenggat pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi,"SELECT *, t_peminjaman.kodePinjam FROM t_peminjaman LEFT JOIN t_user ON t_peminjaman.userID = t_user.userID LEFT JOIN t_buku ON t_peminjaman.bukuID = t_buku.bukuID WHERE t_peminjaman.userID=".$_SESSION['user']['userID']);
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['kodePinjam'];?></td>
                        <td><?php echo $data['username'];?></td>
                        <td><?php echo $data['judul'];?></td>
                        <td><?php echo $data['jumlahPinjam'];?></td>
                        <td><?php echo $data['tgl_peminjaman'];?></td>
                        <td><?php echo $data['tgl_pengembalian'];?></td>
                        <td><?php echo $data['tenggat_pengembalian'];?></td>
                        <td><?php echo $data['statusPeminjaman'];?></td>
                        <td>
                            <?php
                            if ($data['statusPeminjaman'] != 'dikembalikan' && $data['statusPeminjaman'] != 'dibatalkan'){
                            ?>
                            <p></p>
                            <a href="?page=peminjaman_batal&&id=<?php echo $data['peminjamanID'];?>" class="btn btn-danger"><i class='fas fa-trash-alt' style='font-size:20px'></i></a>
                           <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
