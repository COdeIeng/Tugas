<h2>Data Produk</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>harga</th>
            <th>meter</th>
            <th>foto</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while($pecah = $ambil ->fetch_assoc()){ 
        ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['harga_produk'];?></td>
            <td><?php echo $pecah['meter'];?></td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
            </td>
            <td>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['idproduk'];?>" class="btn-warning btn">edit</a>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['idproduk'];?>" class="btn-danger btn">hapus</a>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn-primary btn">Tambah Data</a>