<?php
session_start();
 
 $conn=mysqli_connect('localhost','root', '','web'); 

if(isset($_POST['login'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
   
    $check =mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung=mysqli_num_rows($check);
 

   if($hitung>0){
     $_SESSION['login'] ='TRUE';
        header('location:index.php');
    } else{
     echo '<script> alert("username atau password salah");
     window.location.href="login.php"
     </script>';
    }





}

if(isset($_POST['tambahbarang'])){
        $namaproduk =$_POST['namaproduk'];
        $deskripsi =$_POST['deskripsi'];
        $harga =$_POST['harga'];
        $stock =$_POST['stock'];
    $insert =mysqli_query($conn,"insert into produk(namaproduk,deskripsi,harga,stock)value('$namaproduk','$deskripsi','$harga','$stock')");
    
    if($insert){
        header('location:stock.php');

    } else {
        echo '<script> alert("Gagal menambah barang");
        window.location.href="stock.php"
        </script>';  
    }
};
 
if(isset($_POST['tambahpelanggan'])){
    $namapelanggan =$_POST['namapelanggan'];
    $notelp =$_POST['notelp'];
    $alamat =$_POST['alamat'];
$insert =mysqli_query($conn,"insert into pelanggan(namapelanggan,notelp,alamat,)value('$namapelanggan','$notelp','$alamat')");

if($insert){
    header('location:pelanggan.php');

} else {
    echo '<script> alert("Gagal nambah pelanggan baru");
    window.location.href="pelanggan.php"
    </script>';  
}
};

?>