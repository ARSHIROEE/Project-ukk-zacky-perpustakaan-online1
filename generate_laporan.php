<head>
    <link rel="stylesheet" href="generate.css">
</head>
<div class="card">
    <div class="card-body">
    <img src="logo.png" alt="logo">
        <h2>Pepustakaan web</h2>
        <div class="row">
            <div class="col-md-12">
                <table border="1" align="center">
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjam</th> 
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                    </tr>
                    <?php
                    require_once("koneksi.php");

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
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    window.print();
    setTimeout(function(){
        window.close();
    },1000);
</script>
