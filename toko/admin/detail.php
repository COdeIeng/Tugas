<h2>Detail Pembelian</h2>
<?php $ambil = $koneksi ->query("SELECT * FROM pembelian JOIN pelanggan ON 
pembelian.idpelanggan=pelanggan.idpelanggan WHERE pembelian.idpembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['nama_pelanggan'];?></strong> <br>
<p>
        <?php echo $detail['nomor_pelanggan']; ?> <br>
        <?php echo $detail['email_pelanggan']; ?>
</p>
<p>
   tanggal : <?php echo $detail['tanggal_pembelian'];?> <br>
   Total   :Rp.<?php echo number_format($detail['total_pembelian']);?> 
</p>
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