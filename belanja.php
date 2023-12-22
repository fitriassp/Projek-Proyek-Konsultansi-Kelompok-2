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
    background-image: url('images/belan.jpeg') ;
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
    <a href="#" class="navbar-brand text-dark fs-3"><img src="images/kudaputih.png" width="120" height="120" alt=""></a>
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
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-dark fs-3">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark fs-3">New In</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark fs-3">Collaboration</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark fs-3">Shop All</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark fs-3">Need Help</a>
                </li>
                <li class="nav-item" >
                    <a href="#" ><i  class="fs-3 bi bi-heart bi-9x nav-link text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <p><strong>Login</strong></p>
                                    <form action="" method="post">
                                        <div class="col-auto">
                                            <a href="signout.php" class="btn btn-dark mb-3" name="proseslog">Log Out</a>
                                        </div>
                                    </form>
                            </div>
                        </div>
                      
                    </li>
            <li class="nav-item">
            <i class="bi bi-person-fill fs-3 bi-9x nav-link text-dark"></i>
        </li>
        <li class="nav-item">
        <i class="bi bi-bag-heart bi-9x fs-3 nav-link text-dark"></i>
        </ul>
        </li>
        

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
                <li class="breadcrumb-item"><a href="catalogue.php">Catalogue</a></li>
                <li class="breadcrumb-item"><a href="keranjang.php">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
            </div>
        </nav>


        <div class="container">
          <div class="row">
            <div class="col">
        <h1>Delivery</h1>
        <form action="" method="post">
        
<div class="mb-3">
  <label for="exam pleFormControlInput1" class="form-label">Account</label>
  <input type="text" class="form-control" readonly value="<?php echo $_SESSION["user"]['username']?>">
</div>
<div class="mb-3">
  <label for="exam pleFormControlInput1" class="form-label">Email</label>
  <input type="text" class="form-control" readonly value="<?php echo $_SESSION["user"]['email']?>">
</div>

<select class="form-control" name="idongkir" aria-label="Default select example">
  <option selected>Choose Delivery Option</option>
  <?php 
  
  $ambil = $koneksi->query("SELECT * FROM ongkir");
  while($perongkir = $ambil->fetch_assoc()){
?>
<option value="<?php echo $perongkir["idongkir"]?>">
<?php echo $perongkir["agensi"]?>
  </option>

<?php
  }

  ?>

  
  
</select>





<div class="container d-flex justify-content-center">
<?php $totalbelanja = 0;?>
    <?php foreach($_SESSION["keranjang"] as $idproduk=>$jumlah):?>

    <?php
      $ambil = $koneksi->query("SELECT * FROM fashionista WHERE idpakaian='$idproduk'");
      $pecah = $ambil->fetch_assoc();
      $subharga = $pecah["hargapakaian"]*$jumlah;
    ?>

  <div class="row align-items-center me-3 ms-3 mb-3 mt-3">
    <div class="col-md-8">
     <div class="card mb-3" style="width: 18rem;">
      <img src="images/<?php echo $pecah['fotopakaian'];?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $pecah['namapakaian'];?></h5>
        <a href="#" class="btn btn-default">$.<?php echo number_format($pecah['hargapakaian']);?></a>
        <a href="#" class="btn btn-default">= $.<?php echo number_format($subharga);?></a> 
      </div>
     </div>
    </div>
  </div>
  <?php $totalbelanja+=$subharga;?>
  <?php endforeach?>
</div>

<h1>Total</h1>
<h3> = $ <?php echo $totalbelanja;?></h3>
        
        <div class="col-auto">
<div class="d-grid gap-2">
<input class="form-control btn-success" type="submit" value="Buy" name="prosescekut">
</div>
</div>
    </div>
  </div>
</form>









<?php if (isset($_POST["prosescekut"]))
{
  
  $idpelanggan = $_SESSION["user"]["id"];
  $idongkir = $_POST["idongkir"];
  $tanggalbeli = date("Y-m-d");

  $ambil = $koneksi->query("SELECT * FROM ongkir WHERE idongkir='$idongkir'");
  $arrayongkir = $ambil->fetch_assoc();
  $tarif = $arrayongkir['tarif'];

  $totalbeli = $totalbelanja + $tarif;

$koneksi->query("INSERT INTO beli (id, idongkir, tanggalbeli, totalbeli)
VALUES ('$idpelanggan','$idongkir','$tanggalbeli','$totalbeli')");

$idbarubeli = $koneksi->insert_id;
foreach ($_SESSION["keranjang"] as $idpakaian => $jumlah);
{
  $koneksi->query("INSERT INTO penjualan (idbeli, idpakaian, jumlah)
  VALUES ('$idbarubeli','$idpakaian','$jumlah')");
}

unset($_SESSION["keranjang"]);

echo "<script>alert('Purchasing Success!');</script>";
echo "<script>location='nota.php?id=$idbarubeli';</script>";
}



?>

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