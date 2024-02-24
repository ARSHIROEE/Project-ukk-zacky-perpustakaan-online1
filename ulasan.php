<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">

            <div class="input-group mb-3">
                <a href="?page=ulasan_tambah" class="btn btn-lg btn-primary w-10 fs-6">+ Tambah data</a>
            </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
                $qry = mysqli_query($koneksi,"SELECT*FROM t_ulasanbuku left join t_user on t_user.userID = t_ulasanbuku.userID left join t_buku on t_buku.bukuID = t_ulasanbuku.bukuID");
                while($data = mysqli_fetch_array($qry)){
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['ulasan']; ?></td>
                        <td><?php echo $data['rating']; ?></td>
                        <td>
                            <a onclick="return confirm ('Yakin mau di hapus nih?')" href="?page=ulasan_hapus&&id=<?php echo $data['ulasanID'];?>" class="btn btn-danger">Hapus</a>
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