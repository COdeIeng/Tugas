<?php session_start();?>
<?php include 'koneksi.php';    ?>
<?php
$idproduk =$_GET["id"];
$ambil= $koneksi->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
$detail= $ambil->fetch_assoc();


?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>
<section class="konten">
  <div class="container">
     <div class="row">
        <div class="col-md-6">
            <img src="foto_produk/<?php echo $detail["foto_produk"];?>" alt=""class="img-responsive">
        </div>
        <div class="col-md-6">
            <h2><?php echo $detail["nama_produk"]?></h2>
            <h4>Rp.<?php echo number_format($detail["harga_produk"]);?></h4>
            
            <form method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="number"min="1" class="form-control" name="jumlah">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"name="beli">Beli</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_POST["beli"]))
            {
                $jumlah= $_POST["jumlah"];
                $_SESSION["keranjang"][$idproduk]=$jumlah;

                echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                echo "<script>location='keranjang.php';</script>";
            }
            ?>
    
            <p><?php echo $detail["deskripsi"]?></p>
        </div>
     </div>
</div>          
</section>