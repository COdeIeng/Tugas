<h2>ubah produk</h2>
<?php
$ambil= $koneksi->query("SELECT * FROM produk WHERE idproduk='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group"> 
        <label>Nama Produk</label>
        <input type="text"class="form-control" name="nama" value="<?php echo $pecah['nama_produk'];?>">
</div>
<div class="form-group">
    <label>Harga (Rp)</label>
    <input type="number" class="form-control" name="harga"value="<?php echo $pecah['harga_produk'];?>">
</div>
<div class="form-group">
    <label>Meter (M)</label>
    <input type="number" class="form-control" name="meter"value="<?php echo $pecah['meter'];?>">
</div>
<div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi'];?></textarea>
</div>
<div class="form-group">
    <img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="200">
</div>
<div class="form-group">
    <label>Ganti Foto</label>
    <input type="file" class="form-control" name="foto">
</div>
<button class="btn btn-primary" name="ubah">ubah</button>
</form>
<?php   
  if(isset($_POST['ubah']))
  {  
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto =$_FILES['foto']['tmp_name'];
    if(!empty($lokasifoto)){
    move_uploaded_file($lokasi,"../foto_produk/".$nama);
    
        $koneksi->query(" UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',meter='$_POST[meter]',foto_produk=$namafoto',
        deskripsi='$_POST[deskripsi]'WHERE idproduk='$_GET[id]'" );
    }
    else
    {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',meter='$_POST[meter]',
        deskripsi='$_POST[deskripsi]'WHERE idproduk='$_GET[id]'" );
    }
    echo "<script>alert('data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
  }
?>
