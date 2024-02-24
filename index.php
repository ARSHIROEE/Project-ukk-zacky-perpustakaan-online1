<?php
    include 'koneksi.php';
    
        if(!isset($_SESSION['user'])){
            header('location:login.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpusku - dashboard -</i></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <head>
    <link rel="stylesheet" href="body.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
           
        <img src="logo.png" alt="logo" class="navbar-brand ps-3">Perpustakaan Web

            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu bg-white">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="?">
                                <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                               Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Navigasi</div>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <?php
                                if($_SESSION['user']['level'] !='anggota'){
                            
                            ?>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <?php
                                }else{
                            ?>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                Detail peminjaman
                            </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Ulasan
                            </a>
                            <?php
                            if($_SESSION['user']['level'] =='admin'){ 
                            ?>
                            <a class="nav-link" href="?page=register-admin-petugas">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Tambah User
                            </a>
                            <?php
                            }
                            ?>

                            <?php
                            if($_SESSION['user']['level'] == 'admin' || $_SESSION['user']['level'] == 'petugas'){
                            ?>
                            <a href="?page=laporan" class="btn btn-success"><i class="fas fa-print"></i>Laporan Peminjaman
                            </a>
                            <?php
                            }
                            ?>
                            <a onclick="return confirm ('Anda ingin logout?')" class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-power-off"></i></div>
                                 Logout
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><?php echo $_SESSION['user']['namaLengkap'];?></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if(file_exists($page . '.php')){
                                include $page . '.php';
                            }else{
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;M Zacky Aryatama</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
?>