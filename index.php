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
    background-image: url('images/indexi.jpg') ;
    background-position: cover;
  }
  .banner-image-1{
    background-image: url('banner.jpg') ;
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
<nav class="navbar fixed-top navbar-expand-xl navbar-dark p-md-2">
  <div class="container">
    <a href="index.php"  class="navbar-brand fs-3">
    <img src="images/kudaputih.png" width="120" height="120" alt="">    
   </a>
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
                    <a  class="nav-link fs-3 text-white">Home</a>
                </li>
                <li class="nav-item">
                    <a href="arrival.php" class="nav-link fs-3 text-white">New In</a>
                </li>
                <li class="nav-item">
                    <a href="collab.php" class="nav-link fs-3 text-white">Collaboration</a>
                </li>
                <li class="nav-item">
                    <a href="catalogue.php" class="nav-link fs-3 text-white">Shop All</a>
                </li>
                <li class="nav-item">
                    <a href="information.php" class="nav-link fs-3 text-white">Need Help</a>
                </li>
                <li class="nav-item" >
                    <a href="keranjang.php" ><i  class="bi bi-heart bi-9x fs-3 nav-link text-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        

                    </li>
                    <?php if (!isset($_SESSION["user"])):?>
                    <li class="nav-item" >
                    <a href="#" ><i  class="bi bi-person bi-9x fs-3 nav-link text-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
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
                                                <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*********">
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
                    <a href="#" ><i  class="bi bi-person fs-3 bi-9x nav-link text-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
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
        <a href="dbes.php" > <i class="bi bi-bag-heart fs-3 bi-9x nav-link text-white"></i></a>
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
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="content text-center">
    <h3 class="text-white display-1  fst-italic" id="home_text">WELKOMMEN!</h3>
    <h1 class="text-white  fst-italic " id="home_text">to NAUR.co Official</h1>
    <p class="lead text-white">
        
      </p>
    </div>
  </div>
</div>
<div class="banner-image-1 w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
    <div class="content text-center">
      <h1 class=" display-1 fst-italic text-dark" id="home_text">DISCOVER THE</h1>
      <h1 class=" display-1 fst-italic text-dark" id="home_text">WINTER & AUTUMN LOOKBOOK</h1>
    </div>
    </div>
  </div>

  <div class="container justify-content-center my-5">
    <h1>NEW ARRIVAL</h1>
        <div class="content-images-fluid">
            <div class="row ">
                <div class="col-3">
                    <div class="image-fluid" style="width: 18rem;">
                        <img src="konpes.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <a href="catalogue.php"    ><h5 class="card-title text-dark">Converse All Star 76 Emerald Saga </h5></a>
                                <p class="card-text">Start from street, born to street </p>
                            </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="image-fluid" style="width: 18rem;">
                        <img src="download (5).jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <a href="catalogue.php"    > <h5 class="card-title text-dark">Cat Eye Sunblast Glasses</h5></a>
                                <p class="card-text">Born to Rock! </p>
                            </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="image-fluid" style="width: 18rem;">
                        <img src="Designer Clothes, Shoes & Bags for Women _ SSENSE.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <a href="catalogue.php"    ><h5 class="card-title text-dark">Novaria Heels</h5></a>
                                <p class="card-text">Elegant & Egalitaire </p>
                            </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="image-fluid" style="width: 18rem;">
                        <img src="nb.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <a href="catalogue.php"    > <h5 class="card-title text-dark">New Balance 550 Year Edition</h5></a>
                                <p class="card-text">Versatile and Timeless</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-image-2 w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
        <div class="content text-center">
          <h1 class="text-white fst-italic fw-bold " id="home_text">WEEKLY EVENT </h1>
        </div>
        </div>
      </div>


      <div class="container-2 bg-success p-md-3">
       
            <div class="content-fluid">
                <div class="row text-white">
                    <div class="col-3 text-center">
                        <p>Garansi 100%</p>
                    </div>
                    <div class="col-3 text-center">
                        <p>Return & Refunds</p>
                    </div>
                    <div class="col-3 text-center">
                        <p>Discount Member</p>
                    </div>
                    <div class="col-3 text-center">
                        <p>100% Original</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-3 bg-warning p-md-3" id="alpha">
       
            <div class="content-fluid">
                <div class="row text-dark">
                <div class="col-2 text-center">
                    <p>CONTACT US :</p>
                    </div>
                    <div class="col-2 text-center">
                        <p>@NAURR_</p>
                    </div>
                    <div class="col-2 text-center">
                    <p>+622-454-794</p>
                    </div>
                    <div class="col-2 text-center">
                    <p>naurofficiel@gmail.co.us</p>
                    </div>
                    <div class="col-2 text-center">
                    <p>ST. Aix en Provence 19.B.7</p>
                    </div>
                    <div class="col-2 text-center">
                    <p>Made in France</p>
                    </div>
                    
                </div>
            </div>
        </div>

        


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>