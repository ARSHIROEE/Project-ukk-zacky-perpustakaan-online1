<h1 class="mt-4">Tambah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
            <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])){
                            $kategori = $_POST['kategori'];
                            $query = mysqli_query($koneksi,"INSERT INTO t_kategoribuku(kategori) values ('$kategori')");

                            if($query){
                                echo '<script>alert("Selamat Tambah data Berhasil");location.href="index.php?page=kategori";</script>';
                            }else{
                                echo '<script>alert("Maaf data gagal di tambahkan");</script>';
                            }
                        }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2"><h4>Kategori</h4></div>
                        <div class="col-md-8"><input type="text" name="kategori" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>