<?php 
session_start();
require 'php/fungsi.php';


if( isset($_SESSION["login"]) ) {
	header("Location: home.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koma.</title>

    <!-- Logo  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS-->
    <link rel="stylesheet" href="styles/homestyle.css">

</head>
<body>

<!-- Home  -->

<section class="home" id="home">

    <div class="content">
        <h3>Toko Material Digital!</h3>
        <p>Sebuah toko material yang dapat diakses dimana saja dan kapan saja.</p>
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn">Registrasi</a>
    </div>

</section>

<!-- Home -->

</body>
</html>