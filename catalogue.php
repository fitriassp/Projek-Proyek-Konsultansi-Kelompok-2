<?php

include "koneksi.php";
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .banner-image-2{
    background-image: url('images/order.jpeg') ;
    background-position: cover;}
    </style>
  <!-- basic -->
  <meta charset="utf-8">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<style>

  nav ul li{

padding : 0 10px 0 10px;

}
</style>
</head>
<body>
  <!-- Navbar -->
<!-- Navbar -->
<nav class="navbar  navbar-expand-xl navbar-dark p-md-3">
  <div class="container">
    <a href="index.php" class="navbar-brand fs-3 text-dark"><img src="images/logs.png" width="120" height="120" alt=""></a>
        <button 
        type="button"
        class="navbar-toggler"
        data-bs-target="#navbarNav"
        data-bs-toggle="collapse"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle Navbar"
        >
            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav"></div>
            <ul class="navbar-nav g-5 ">
                <li class="nav-item">
                    <a href="index.php" class="nav-link fs-3 text-dark">Home</a>
                </li>
                <li class="nav-item">
                    <a href="arrival.php" class="nav-link fs-3 text-dark">New In</a>
                </li>
                <li class="nav-item">
                    <a href="collab.php" class="nav-link fs-3 text-dark">Collaboration</a>
                </li>
                <li class="nav-item">
                    <a href="catalogue.php" class="nav-link fs-3 text-dark">Shop All</a>
                </li>
                <li class="nav-item">
                    <a href="information.php" class="nav-link fs-3 text-dark">Need Help</a>
                </li>
                <li class="nav-item" >
                    <a href="keranjang.php" ><i  class="bi bi-heart bi-9x fs-3 nav-link text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        

                    </li>
                    <?php if (!isset($_SESSION["user"])):?>
                    <li class="nav-item" >
                    <a href="#" ><i  class="bi bi-person bi-9x fs-3 nav-link text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <p><strong>Login</strong></p>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="name@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*********">
                                        </div>
                                  
                                        <div class="col-auto">
                                            <button class="btn btn-dark mb-3" name="proseslog">Log In</button>
                                        </div>
                                    </form>
                                    <a href="register.php"><p class="text-link"><u>Belum punya akun?</u></p></a>
                        
                                                
                                </div>
                         </div>

                    </li>
                    <?php else: ?>
                        <li class="nav-item" >
                    <a href="#" ><i  class="bi bi-person fs-3 bi-9x nav-link text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                            <p><strong>Halo,<?php echo $_SESSION["user"]['username']?></strong></p>
                                
                                    <form action="" method="post">
                                        <div class="col-auto">
                                            <a href="signout.php" class="btn btn-dark mb-3" name="proseslog">Log Out</a>
                                        </div>
                                    </form>
                            </div>
                        </div>
                      
                    </li>
                    <?php endif?>
        <li class="nav-item">
        <a href="dbes.php" > <i class="bi bi-bag-heart fs-3 bi-9x nav-link text-dark"></i></a>
        </ul>
        </li>
        <?php
                    if (isset($_POST["proseslog"]))
                    {
                        $username = $_POST["username"];
                        $password = $_POST["password"];

                        $ambil = $koneksi-> query("SELECT * FROM user WHERE username='$username' AND password='$password'");
                        $akuncocok = $ambil->num_rows;
                        if ($akuncocok==1){
                            $akun = $ambil->fetch_assoc();
                            $_SESSION["user"] = $akun;
                            echo "<script>alert('anda sukses login');</script>";
                            echo "<script>location='index.php';</script>";
                        }
                        else
                        {
                            echo "<script>alert('anda gagal login');</script>";
                            echo "<script>location='index.php';</script>";
                        }
                    }
                    ?>

    </div>     
  </div>
</nav>

<div class="banner-image-2 w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
        <div class="content text-center">
          <h1 class="text-white display-1 fst-italic" id="home_text">#</h1>
        </div>
        </div>
      </div>
<div class="container">
<form Action="" method="get" class="d-flex">
    <label for="cari">
        <input class="form-control me-2" type="text" name="cari" placeholder="Search" aria-label="Search" >
        
      </form>
      
  <div class="row align-items-start">
    
    <?php   
    $ambil = $koneksi->query ("SELECT * FROM fashionista");
    if(isset($_GET['cari']))
    $ambil = $koneksi->query("SELECT * FROM fashionista WHERE namapakaian LIKE '%".
    $_GET['cari']."%'");
       
       while($perproduk = $ambil->fetch_assoc()){
    ?>
    
        <div class="col-4 my-3 ">
            <div class="card border-0" style="width: 300px;">
                <img src="images/<?php echo $perproduk['fotopakaian'];?>" alt="...">
                    <div class="card-body">
                        <h3 class=" font-weight-bold text-dark text-center"><?php echo $perproduk['namapakaian'];?></h3>
                        <a href="beli.php?id=<?php echo $perproduk['idpakaian'];?>"><h5 class="card-title text-dark text-center">$<?php echo $perproduk['hargapakaian'];?></h5></a>
                    </div>
            </div>
        </div>
        <?php } ?>
       
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>