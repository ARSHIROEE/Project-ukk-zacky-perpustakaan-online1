<?php
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Log-Reg.css">
    <link rel="stylesheet" href="icon.css">
    <title>Halaman Registrasi Perpustakaan Web</title>
</head>
<body>
<form method="post">
    
    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

<!----------------------- Login Container -------------------------->

   <div class="row border rounded-5 p-3 bg-white shadow box-area">

<!--------------------------- Left Box ----------------------------->

   <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
       <div class="featured-image mb-3">
        <img src="images/1.png" class="img-fluid" style="width: 250px;">
       </div>
       <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Perpustakaan Web</p>
       <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Registrasi untuk mendapatkan akun.</small>
   </div> 

   
            <!-- php section -->
            <?php
                if(isset($_POST['register'])){
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $namaLengkap = $_POST['namaLengkap'];
                    $email = $_POST['email'];
                    $telp = $_POST['telp'];
                    $alamat = $_POST['alamat'];
                    $level = $_POST['level'];

                    // Cek apakah username sudah ada di database
                    $check_username_query = mysqli_query($koneksi, "SELECT * FROM t_user WHERE username = '$username'");
                    if(mysqli_num_rows($check_username_query) > 0) {
                        echo '<script>alert("Maaf, username sudah digunakan"); location.href="register.php";</script>';
                    } else {
                        // Cek apakah nama lengkap sudah ada di database
                        $check_nama_query = mysqli_query($koneksi, "SELECT * FROM t_user WHERE namaLengkap = '$namaLengkap'");
                        if(mysqli_num_rows($check_nama_query) > 0) {
                            echo '<script>alert("Maaf, nama lengkap sudah digunakan"); location.href="register.php";</script>';
                        } else {
                            // Jika username dan nama lengkap belum ada, lakukan proses registrasi
                            $inn = mysqli_query($koneksi,"INSERT INTO t_user (username,password,namaLengkap,email,telp,alamat,level) VALUES ('$username','$password','$namaLengkap','$email','$telp','$alamat','$level')");

                            if($inn){
                                echo '<script>alert("Selamat Register Berhasil");location.href="login.php";</script>';
                            } else {
                                echo'<script>alert("Maap Registrasi akun gagal"); location.href="register.php";</script>';
                            }
                        }
                    }
                }
            ?>

<!-------------------- ------ Right Box ---------------------------->
    
   <div class="col-md-6 right-box">
      <div class="row align-items-center">
            <div class="header-text mb-4">
            <h2>Halaman Registrasi</h2>
                 <p>Kami senang melihatmu di sini.</p>
            </div>

                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required >
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-group mb-2">
                    <input class="form-control form-control-lg bg-light fs-6" id="password" name="password" type="password" placeholder="Password" required>
                </div>
                <div class="input-group mb-2">
                    <input class="form-control form-control-lg bg-light fs-6" id="email" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="input-group mb-2">
                    <input class="form-control form-control-lg bg-light fs-6" type="number" maxlength="13" id="telp" name="telp" placeholder="Nomor telpon mu" required>
                </div>
                <div class="input-group mb-2">
                    <input class="form-control form-control-lg bg-light fs-6" id="alamat" name="alamat" type="text" placeholder="Alamatmu" required>
                    <input type="hidden" id="level" name="level" value="anggota">
                </div>
            <div>
                <br>
            </div>

            
            <div class="input-group mb-3">
                <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" name="register" value="register">Register</button>
            </div>
            <div class="row">
                <small>Sudah punya akun?... <a href="login.php">Klik di sini...</a></small>
            </div>
      </div>
   </div> 

  </div>
</div>
</form>

</body>
</html>
