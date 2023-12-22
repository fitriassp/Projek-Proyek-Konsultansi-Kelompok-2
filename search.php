<?php

include 'koneksi.php';?>
<?php 
$keyword = $_GET["keyword"];

$semuadata=array();
$take = $koneksi->query("SELECT * FROM fashionista WHERE namapakaian LIKE '%$keyword%");
while($send = $take->fetch_assoc())
{
    $semuadata[]=$send;
}

echo "<pre>";
print_r($semuadata);
echo"</pre>";

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

</head>
<body>
  


</body>
</html>