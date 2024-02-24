<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">

            <div class="input-group mb-3">
                <a href="?page=kategori_tambah" class="btn btn-lg btn-primary w-10 fs-6">+ Tambah data</a>
            </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
                $qry = mysqli_query($koneksi,"SELECT*FROM t_kategoribuku");
                while($data = mysqli_fetch_array($qry)){
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td>
                            <a href="?page=kategori_ubah&&id=<?php echo $data['kategoriID'];?>" class="btn btn-info">Ubah</a>
                            <a onclick="return confirm ('Anda yakin ingin menghapus kategori ini?')" href="?page=kategori_hapus&&id=<?php echo $data['kategoriID'];?>" class="btn btn-danger">Hapus</a>
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