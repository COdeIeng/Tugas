<?php 
session_start();
$idproduk=$_GET['id'];

if(isset($_SESSION['keranjang'][$idproduk]))
{
    $_SESSION['keranjang'][$idproduk]+=1;
}
else
{
    $_SESSION['keranjang'][$idproduk]= 1;
}

echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php ';</script>";
?>