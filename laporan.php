<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="generate_laporan.php" class="btn btn-primary"><i class='fas fa-file-powerpoint' style='font-size:24px'></i> Generate</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjam</th> 
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT t_peminjaman.*, t_user.username, t_buku.judul FROM t_peminjaman 
                    LEFT JOIN t_user ON t_peminjaman.userID = t_user.userID 
                    LEFT JOIN t_buku ON t_peminjaman.bukuID = t_buku.bukuID");

                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['kodePinjam'];?></td>
                        <td><?php echo $data['username'];?></td>
                        <td><?php echo $data['judul'];?></td>
                        <td><?php echo $data['tgl_peminjaman'];?></td>
                        <td><?php echo $data['tgl_pengembalian'];?></td>
                        <td><?php echo $data['statusPeminjaman'];?></td>
                        <td>
                        <?php
                            if ($data['statusPeminjaman'] != 'dikembalikan' && $data['statusPeminjaman'] != 'dibatalkan'){
                            ?>
                            <p></p>
                            <a href="proses_pengembalian.php?peminjamanID=<?php echo $data['peminjamanID'];?>" class="btn btn-primary"><i class='fas fa-caret-square-right' style='font-size:20px'></i></a>

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
