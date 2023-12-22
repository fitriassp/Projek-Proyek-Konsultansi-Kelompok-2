<?php
include "koneksi.php";
session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <!-- basic -->
  <meta charset="utf-8">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<style>
  .banner-image{
    background-color: white ;
    background-position: cover;
  }
  .banner-image-1{
    background-image: url('images/thank.jpeg') ;
    background-position: cover;
  }
  .banner-image-2{
    background-image: url('banner3.jpg') ;
    background-position: cover;
  }
  .home_text{
    color:rgb(255, 255, 255);
  }
  nav ul li{

padding : 0 10px 0 10px;

}
</style>


</head>
<body>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-xl navbar-dark p-md-3">
  <div class="container">
    <a href="index.php" class="navbar-brand fs-3"><img src="images/logs.png" width="120" height="120" alt=""></a>
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

     <!-- Banner Image -->



    <div class="banner-image-1 w-100 vh-100 d-flex justify-content-center align-items-center"></div>
      <div class="container">
        <div class="content ">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order History</li>
              </ol>
          </nav>
        </div>
       


        <div class="container">


            <h1>Your Orders Detail</h1>

            <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Delivery Receipt</th>
          
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $iduser = $_SESSION["user"]['id'];
               $ambil = $koneksi->query("SELECT * FROM beli WHERE id='$iduser'");
                while($pecah = $ambil->fetch_assoc()){

                ?>

                <tr>
                    <td><?php echo $pecah["tanggalbeli"]?></td>
                    <td><?php echo $pecah["idbeli"]?>-53243118906PX</td>
       
                    <td>
                        <a href="nota.php?id=<?php echo $pecah["idbeli"]?>" class="btn btn-dark">Detail</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        
        
            </table>




</div>
    </div>
    </div>
    </div>



        
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="content ">
    
    </div>
  </div>
</div>
 



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>