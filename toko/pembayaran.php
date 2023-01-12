<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION["pelanggan"])  OR empty($_SESSION["pelanggan"]))
{
    echo "<script>?alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
    $idpem= $_GET["id"];
    $ambil= $koneksi->query("SELECT * FROM pembelian WHERE idpembelian='$idpem'");
    $detpem= $ambil->fetch_assoc();

    $id_pelanggan_beli= $detpem["idpelanggan"];
    $id_pelanggan_login= $_SESSION["pelanggan"]["idpelanggan"];

    if($id_pelanggan_login !==$id_pelanggan_beli)
    {
        echo "<script>location='riwayat.php';</script>";  
    } 
?>  
<!DOCTYPE html>
    <html>
    <head>
    <title>Toko Hendra</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    </head>
 <body>
    <?php include 'menu.php';?>
    <div class="container">
        <div>
            <h2>Konfirmasi Pembayaran</h2>
            <div class="alert alert-info">Total tagihan anda 
                <strong>Rp. <?php echo number_format($detpem["total_pembelian"])?></strong>
            </div>
            <form method="post">
                <div class="form-group">
                    <label>Nama Penyetor</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Bank</label>
                    <input type="text" class="form-control" name="bank">
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" min="1">
                </div>
                <button class="btn btn-primary" name="kirim">kirim</button>
            </form>
        
        </div>
    </div>
    <?php
    if(isset($_POST["kirim"]))
    {
        $nama= $_POST["nama"];
        $bank= $_POST["bank"];
        $jumlah= $_POST["jumlah"];
        $tanggal= date("Y-m-d");
        $koneksi->query("INSERT INTO pembayaran(idpembelian,nama,bank,jumlah,tanggal)
        VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal')");
    }
    ?>      
</body>
</html>