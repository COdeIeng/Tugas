<?php
require 'ceklogin.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Pelanggan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                stock barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                barang masuk
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola pelanggan
                            </a>
                            <a class="nav-link" href="index.php">
                                Logout
                            </a>
                            
                            
                    </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data pelanggan</h1>
                        
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-3 mt-5  ">
                                    <div class="card-body">Jumlah pelanggan</div>
                                </div>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">
                                 Tambah Pelanggan
                                </button>
                            </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data pelanggan
                            </div>
                            <<div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                        $get=mysqli_query($conn,"select * from produk");
                                        $i=1;
                                        while($produk=mysqli_fetch_array($get)){
                                        $namaproduk=$produk['namaproduk'];
                                        $deskripsi=$produk['deskripsi'];
                                        $harga=$produk['harga'];
                                        $stock=$produk['stock'];
                                        
                                        ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$namaproduk?></td>
                                            <td><?=$deskripsi?></td>
                                            <td><?=$harga?></td>
                                            <td><?=$stock?></td>
                                            <td> Edit delete  </td>
                                        </tr>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pelanggan</h4>
        <button type="button" class="close" data-dismiss="modal"></button>
      </div>
    <form method="post">
      <!-- Modal body -->
      <div class="modal-body">
        <input type="text" name="namapelanggan" class="form-control " placeholder="Nama Pelanggan">
        <input type="text" name="notelp" class="form-control mt-2" placeholder="No Telepon">
        <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" name="tambahpelanggan">Submit</button> 
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    <form>
    </div>
  </div>
</html>
