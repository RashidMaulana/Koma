<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja</title>

    <!-- Logo  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS-->
    <link rel="stylesheet" href="Styles/marketstyle.css">

    <link rel="stylesheet" href="Styles/checkoutstyle.css">
    
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
    
        
    
    </header>

    <!--Header-->

    <!-- Produk -->

<section class="products" id="products">

    <h1 class="heading"> our <span>products</span> </h1>



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<nav class="navbar navbar-default "style = "background-color: black; border-style: none;">
  <div class="container-fluid" >
    <!-- <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
    </div> -->
    <div>
      <div class="collapse navbar-collapse" id="myNavbar" >
        <ul class="nav navbar-nav" >
          <li ><a href="marketplace.php?halaman=produk"><strong>Produk</strong></a></li>
          <li><a href="marketplace.php?halaman=keranjang-belanja"><strong>Keranjang Belanja</strong> </a></li>
        
        </ul>

      </div>
    </div>
  </div>
</nav>

<div class="box-container" style="">
<?php 
    if(isset($_GET['halaman'])){
        $halaman = $_GET['halaman'];
        switch ($halaman) {
            case 'produk':
                include "produk.php";
                ?>
</div>
<div class="pagination">
        <a href="">Sebelumnya</a>
        <a class="hoverable" href="">1</a>
        <a class="hoverable" href="">2</a>
        <a class="hoverable" href="">3</a>
        <a class="hoverable" href="">4</a>
        <a class="hoverable" href="">5</a>
        <a href="">Selanjutnya  </a>
    </div>
</section>

<section class="checkout">
                <?php
                break;
            case 'keranjang-belanja':
                include "keranjang-belanja.php";
                break;
            default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
        }
    }else {
        include "produk.php";
    }
?>
</section>

            
    <!-- </div> -->

    
    



    <!-- <div class="box-container">

        <div class="box" id="item1">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart" onclick="addToCart(item1)"></a>
            </div>
            <div class="image">
                <img src="Images/semen.jpg" alt="">
            </div>
            <div class="content">
                <h3>Semen 1 Sak</h3>
                <div class="price">Rp50.000 <span>Rp60.000</span></div>
            </div>
        </div>

        <div class="box" id="item2">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart" onclick="addToCart(item2)"></a>
            </div>
            <div class="image">
                <img src="Images/cat.jpg" alt="">
            </div>
            <div class="content">
                <h3>Cat Avitex</h3>
                <div class="price">Rp60.000 <span>Rp70.000</span></div>
            </div>
        </div>

        <div class="box" id="item3">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart" onclick="addToCart(item3)"></a>
            </div>
            <div class="image">
                <img src="Images/kuas.jpg" alt="">
            </div>
            <div class="content">
                <h3>Kuas 2.5"</h3>
                <div class="price">Rp10.000 <span>Rp15.000</span></div>
            </div>
        </div> -->

<!-- Produk -->

<!-- Footer  -->

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

<!-- Footer -->
<script src="js/script.js"></script>
</body>
</html>