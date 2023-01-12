<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-tittle">Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary"name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
if(isset($_POST['login']))
{ 
    $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan ='$_POST[email]'
    AND password_pelanggan ='$_POST[password]'");
  $yangcocok =$ambil->num_rows;
  if($yangcocok==1)
  {
    $_SESSION['pelanggan']=$ambil->fetch_assoc();
    echo "<script>alert('anda sukses login');</script>";
    if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
    {
        echo "<script>location='checkout.php';</script>";
    }
    else
    {
        echo "<script>location='riwayat.php';</script>";
    }
  }
  else
  { 
    echo "<script>alert('anda gagal login periksa akun anda');</script>";
    echo "<script>location='login.php';</script>";
  }
}
?>
</body>
</html>