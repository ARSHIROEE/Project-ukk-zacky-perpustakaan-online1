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
    <title>Halaman Login Perpustakaan Web</title>
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
       <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Login Sekarang Untuk Mengakses Halaman Utama.</small>
   </div> 

   <!-- php section -->
   <?php
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                
                $data = mysqli_query($koneksi, "SELECT* FROM t_user where username='$username' and password='$password'");
                $cek = mysqli_num_rows($data);
                if($cek > 0 ){
                    $_SESSION['user'] = mysqli_fetch_array($data);
                    echo '<script>alert("Selamat datang, Login Berhasil");location.href="index.php";</script>';
                }else{
                    echo '<script>alert("maap username atau password salah")</script>';
                }
            }
        ?>

<!-------------------- ------ Right Box ---------------------------->
    
   <div class="col-md-6 right-box">
      <div class="row align-items-center">
            <div class="header-text mb-4">
                 <h2>Perpustakaan Online </h2>
                 <p>Kami senang melihatmu kembai.</p>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg bg-light fs-6" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group mb-1">
                <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" type="password" placeholder="Password" required>
            </div>
            <div>
                <br>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" name="login" value="login">Login</button>
            </div>
            <div class="row">
                <small>GK punya akun? <a href="register.php">Klik di sini.</a></small>
            </div>
      </div>
   </div> 

  </div>
</div>
</form>

</body>
</html>