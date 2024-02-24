<h1 class="mt-4">Tambah Data Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <?php
                        if(isset($_POST['submit'])){
                            $kategoriID = $_POST['kategoriID'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahunTerbit = $_POST['tahunTerbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $stok = $_POST['stok'];

                            // Memeriksa apakah file gambar telah diunggah
                            if(isset($_FILES['foto'])){
                                $namaFoto = $_FILES['foto']['name'];
                                $lokasiFoto = $_FILES['foto']['tmp_name'];
                                $direktoriFoto = 'images/' . $namaFoto;
                                
                                if(move_uploaded_file($lokasiFoto, $direktoriFoto)){
                                    $query = mysqli_query($koneksi,"INSERT INTO t_buku(kategoriID, judul, penulis, penerbit, tahunTerbit, deskripsi, stok, foto) VALUES ('$kategoriID','$judul','$penulis','$penerbit','$tahunTerbit','$deskripsi','$stok','$namaFoto')");

                                    if($query){
                                        echo '<script>alert("Selamat Tambah data Berhasil");location.href="index.php?page=buku";</script>';
                                    } else {
                                        echo '<script>alert("Maaf data gagal di tambahkan");</script>';
                                    }
                                } else {
                                    echo '<script>alert("Maaf, terjadi kesalahan saat mengunggah gambar");</script>';
                                }
                            }
                        }
                    ?>
    
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select name="kategoriID" class="form-control">
                                <?php 
                                    $kat = mysqli_query($koneksi,"SELECT * FROM t_kategoribuku");
                                    while($kategori = mysqli_fetch_array($kat)){
                                        ?>
                                        <option value="<?php echo $kategori ['kategoriID'];?>"><?php echo $kategori['kategori'];?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Pilih Foto</div>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="judul" required></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penulis" required></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penerbit" required ></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="tahunTerbit" required ></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Stok</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="stok" required ></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" rows="5" class="form-control" required></textarea>
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