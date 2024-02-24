<?php

    // Sambungkan ke database
    include 'koneksi.php';

    // Periksa apakah pengguna belum login, jika iya, arahkan ke halaman login
    if(!isset($_SESSION['user'])){
        header('location:login.php');
        exit; // Hentikan eksekusi lebih lanjut setelah redirect
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="card.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semakin banyak membaca semakin banyak yang dibaca!!</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM t_kategoribuku"));
                        ?>
                        Total Kategori
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM t_buku"));
                        ?>
                        Total Buku
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM t_ulasanbuku"));
                        ?>
                        Total Ulasan
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM t_user"));
                        ?>
                        Total User
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
