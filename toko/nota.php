<?php 
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
    <html>
    <head>
    <title>Nota</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    </head>
    <body>

<<?php include 'menu.php'; ?>
<section class="konten">
    <div class="container">
    <h2>Detail Pembelian</h2>
<?php $ambil = $koneksi ->query("SELECT * FROM pembelian JOIN pelanggan ON 
pembelian.idpelanggan=pelanggan.idpelanggan WHERE pembelian.idpembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6">
        <h3>Pembelian</h3>
        <strong>No. Pembelian<?php echo $detail['idpembelian'];?></strong> <br>
        Tanggal: <?php echo $detail['tanggal_pembelian'];?><br>
        Total: <?php echo $detail['total_pembelian'];?><br>
    </div>
    <div class="col-md-6">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail['nama_pelanggan'];?></strong> <br>
        <p>
            <?php echo $detail['nomor_pelanggan']; ?> <br>
            <?php echo $detail['email_pelanggan']; ?>
        </p>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.idproduk=produk.idproduk
        WHERE pembelian_produk.idpembelian='$_GET[id]'"); ?>
        <?php while($pecah = $ambil ->fetch_assoc()){ 
              $nomor=1;
              $nomor++;
        ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['harga_produk'];?></td>
            <td><?php echo $pecah['jumlah'];?></td>
            <td><?php echo $pecah['harga_produk'] * $pecah['jumlah'];?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-7">
        <div class="alert alert-info">
            <p>
                Silahkan Melakukan Pembayaran Rp.<?php echo number_format($detail['total_pembelian']);?> ke
                <br>
                <strong>BANK MANDIRI </strong>
            </p>
        </div>
    </div>
</div>

    </div>
</section>