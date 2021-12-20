<?php
session_start(); 
require 'php/fungsi.php';

if (!isset($_SESSION['id']) ){
    echo"<script>
    alert('Belum login!');
    window.location.href='index.php';
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>

    <!-- Logo  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!--CSS-->
    <link rel="stylesheet" href="Styles/kontakstyle.css">

</head>
<body>

    <!--Header-->
    <header class="header">

        <a href="home.php" class="logo">
            <p>Koma.</p>
        </a>
    
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">Tentang</a>
            <a href="marketplace.php">Belanja</a>
            <a href="kontak.php">Kontak</a>
            <a href="profil.php">Profil</a>
        </nav>
    
        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <!-- <div class="fas fa-shopping-cart" id="cart-btn"></div> -->
            <a href="logout.php"><div class="fas fa-sign-out-alt"></div></a>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    
        <div class="search-form">
            <input type="search" id="search-box" placeholder="cari disini...">
            <label for="search-box" class="fas fa-search"></label>
        </div>
    
        <!-- <div class="cart-items-container">
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/semen.jpg" alt="">
                <div class="content">
                    <h3>Semen 1 sak</h3>
                    <div class="price">Rp50.000/-</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/cat.jpg" alt="">
                <div class="content">
                    <h3>Cat 1 liter</h3>
                    <div class="price">Rp60.000/-</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="images/kuas.jpg" alt="">
                <div class="content">
                    <h3>Kuas 2.5"</h3>
                    <div class="price">Rp10.000/-</div>
                </div>
            </div>
            <a href="checkout.php" class="btn">Bayar Sekarang</a>
        </div> -->
    
    </header>
    <!-- Header -->

    <!-- Kontak -->

<section class="kontak" id="kontak">

    <h1 class="heading"> <span>Hubungi</span> Kami </h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed/v1/place?q=uii&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" allowfullscreen="" loading="lazy"></iframe>

        <form action="">
            <h3>Silahkan isi</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="nama anda">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="email anda">
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="number" placeholder="nomor telepon">
            </div>
            <input type="submit" value="Hubungi" class="btn">
        </form>

    </div>

</section>

<!-- Kontak -->

<!--Footer-->



<section class="footer">


    <div class="links">
        <a href="home.php">Home</a>
        <a href="about.php">Tentang</a>
        <a href="marketplace.php">Belanja</a>
        <a href="kontak.php">Kontak</a>
        <a href="profil.php">Profil</a>
    </div>

    <div class="credit">Dibuat Oleh<span> Kelompok Twoyul - PABW Kelas A</span></div>

</section>

<!--Footer-->
<script src="js/script.js"></script>
</body>
</html>