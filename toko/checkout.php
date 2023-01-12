<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
    <html>
    <head>
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    </head>
    <body>

    <?php include 'menu.php'; ?>
<section class="konten">
    <div class="container">
        <h1>Kerajang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1;?>
                <?php $totalbelanja = 0;?>
                <?php foreach ($_SESSION["keranjang"]as $idproduk=>$jumlah):?>
                <?php 
                $ambil= $koneksi->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
                $pecah = $ambil->fetch_assoc();
                $subharga= $pecah["harga_produk"]*$jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $pecah["nama_produk"];?></td>
                    <td>Rp.<?php echo number_format($pecah["harga_produk"]);?></td>
                    <td><?php echo $jumlah;?></td>
                    <td>Rp.<?php echo number_format($subharga);?></td>
                    
                </tr>
                <?php $nomor++;?>
                <?php $totalbelanja+=$subharga;?>
                <?php endforeach?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp.<?php echo number_format($totalbelanja)?></th>
                </tr>
            </tfoot>
                </table>
            <form method="post">
                <
                <div class="row">
                    <div class="col-md-4"><div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']?>"class=form-control>
                </div></div>
                    <div class="col-md-4"><div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nomor_pelanggan']?>"class=form-control>
                </div></div>
                    <div class="col-md-4">
                        <select class="form-control" name="idongkir">
                            <option value="">Pilih Ongkos kirim</option>
                            <?php 
                            $ambil=$koneksi->query("SELECT * FROM ongkir");
                            while($perongkir=$ambil->fetch_assoc()){
                            ?>
                            <option value="<?php echo $perongkir["idongkir"]?>">
                                <?php echo $perongkir['nama_kota']?>
                                Rp.<?php echo number_format($perongkir['tarif'])?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" name="checkout">Checkout</button>
            </form>  
            <?php
                if(isset($_POST["checkout"]))
                {
                    $idpelanggan= $_SESSION["pelanggan"]["idpelanggan"];
                    $id_ongkir= $_POST["idongkir"];
                    $tanggal= date("Y-m-d");

                    $ambil= $koneksi->query("SELECT * FROM ongkir WHERE idongkir='$id_ongkir'");
                    $arrayongkir= $ambil->fetch_assoc();
                    $tarif= $arrayongkir['tarif'];

                    $total_pembelian= $totalbelanja + $tarif;

                    $koneksi->query("INSERT INTO pembelian(idpelanggan,idongkir,tanggal_pembelian,total_pembelian)
                    VALUES('$idpelanggan','$id_ongkir','$tanggal','$total_pembelian')");

                    $id_pembelian_barusan= $koneksi->insert_id;
                    foreach($_SESSION["keranjang"]as $idproduk=>$jumlah)
                    {
                        $koneksi->query("INSERT INTO pembelian_produk(idpembelian,idproduk,jumlah)
                        VALUES('$id_pembelian_barusan','$idproduk','$jumlah')");
                    }
                    unset($_SESSION["keranjang"]);
                    echo "<script>alert('pembelian berhasil');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                }
            ?>           
        </div>                    
    </section>

    </body>
    </html>