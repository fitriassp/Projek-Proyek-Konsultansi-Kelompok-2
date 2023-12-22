<?php

session_start();

//dapet id produk dari url
$id_produk = $_GET['id'];


//jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya di 1+
if(isset($_SESSION["keranjang"][$id_produk]))
{
    $_SESSION["keranjang"][$id_produk]+=1;
}

// selain itu (belum ada di keranjang), dianggap dibeli 1
else
{
    $_SESSION["keranjang"][$id_produk]= 1;
}


echo "<script>alert('An Item Has Choosen');</script>";
echo "<script>location='keranjang.php';</script>";
?>