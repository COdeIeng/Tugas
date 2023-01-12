<!-- navbar -->
<nav class="navbar navbar-default">
    <div class="container">

    <ul class="nav navbar-nav">  
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <?php if(isset($_SESSION ["pelanggan"])):?>
                <li><a href="logout.php">Logout</a></li>
            <?php else : ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="daftar.php">Daftar</a></li>
            <?php endif?>
            
            <li><a href="checkout.php">Checkout</a></li>
            <li><a href="riwayat.php">Riwayat</a></li>
            <li><a href="about.php">Tentang Kami</a></li>
            <li><a href="contact.php">Hubungi kami</a></li>
        </ul>
    </div>
</nav>

