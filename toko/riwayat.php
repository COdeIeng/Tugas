<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION["pelanggan"])  OR empty($_SESSION["pelanggan"]))
{
    echo "<script>?alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
    <html>
    <head>
    <title>Toko Hendra</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    </head>
    <body>
        
<?php include 'menu.php'; ?>
    <section class="riwayat">
        <div>
            <h3>Riwayat Belanja  <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nomor=1;
                    $id_pelanggan=$_SESSION["pelanggan"]["idpelanggan"];
                    
                    $ambil= $koneksi->query("SELECT * FROM pembelian WHERE idpelanggan='$id_pelanggan'");
                    while ($pecah= $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $pecah["tanggal_pembelian"]?></td>
                        <td>Rp.<?php echo number_format($pecah["total_pembelian"])?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah["idpembelian"]?>" class="btn btn-info">Nota</a>
                            <a href="pembayaran.php?id=<?php echo $pecah["idpembelian"]?>" class="btn btn-success">Pembayaran</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>     
</body>
</html>