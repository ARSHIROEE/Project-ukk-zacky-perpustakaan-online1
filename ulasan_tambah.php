<?php
if (isset($_POST['submit'])) {
    $userID = $_SESSION['user']['userID'];
    $bukuID = $_POST['bukuID'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $query = mysqli_query($koneksi, "INSERT INTO t_ulasanbuku(userID,bukuID,ulasan,rating) VALUES ('$userID','$bukuID','$ulasan','$rating')");

    if ($query) {
        echo '<script>alert("Selamat ulasan berhasil di posting");</script>';
    } else {
        echo '<script>alert("Maaf ulasan gagal di posting");</script>';
    }
}
?>

<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
            <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="col mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                        <select name="bukuID" class="form-control">
                                <?php 
                                    $buk = mysqli_query($koneksi,"SELECT * FROM t_buku");
                                     while($buku = mysqli_fetch_array($buk)){
                                        ?>
                                        <option value="<?php echo $buku ['bukuID'];?>"><?php echo $buku['judul'];?></option>
                                        <?php
                                     }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-mb-2">Ulasan</div>
                        <div class="col-md-8">
                            <textarea name="ulasan"rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-mb-2">Rating</div>
                        <div class="col-md-8">
                            <select name="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
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