<?php
session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FruitFish</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/mainpage.css">
  <link rel="stylesheet" href="../assets/css/toplinks.css">
  <link rel="stylesheet" href="../assets/css/sidebar.css">
  <link rel="stylesheet" href="../assets/css/colors.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <link rel="stylesheet" href="../assets/css/bestel.css">
  <link rel="stylesheet" href="../assets/css/homepage.css">
  <link rel="stylesheet" href="../assets/css/detailpag.css">
  <link rel="stylesheet" href="../assets/css/winkelwagen.css">
  <link rel="stylesheet" href="../assets/css/login.css">
  <link rel="stylesheet" href="../assets/css/bedank.css">

  <meta name="description" content="">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta property="og:image:alt" content="">

  <link rel="icon" href="../assets/iconen/fandf.png" sizes="any">
  <link rel="icon" href="../assets/iconen/fandf.png" type="image/svg+xml">
  <link rel="apple-touch-icon" href="fandf.png">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <div class="ping" id="pongping"></div>
  <div class="page">
    <div id="navbalk">
      <div id="logo" onclick="document.location='./homepage.php'"><img id="logoimg" src="../assets/iconen/fandf.png" alt="logo"></div> <!--logo -->
      <div class="navlinks" id="navlinks"> <!--eerste paar navigatiebalk links-->
        <a class="links" href="./schilderijen.php" target="_self">Schilderijen</a>
        <a class="links" href="./tekeningen.php" target="_self">Tekeningen</a>
        <a class="links" href="./kaarten.php" target="_self">Kaarten</a>
        <a class="links" href="./dozen.php" target="_self">Dozen</a>
        <a class="links" href="./accesoires.php" target="_self">Accessoires</a>
        <input type="text" id="search" name="search" placeholder="Search.." oninput="pingpong()">
      </div>
      <div class="homelinks" id="homelinks"> <!--laatste paar navigatiebalk links-->
        <a class="links" href="./loginpage.php" target="_blank">Inloggen &nbsp;<img
            src="../assets/iconen/usertwo.png" alt="inlogteken"></a>
        <a class="links" href="./winkelwagen.php" target="_blank">Favorieten &nbsp;<img
            src="../assets/iconen/heart.png" alt="hartje"></a>
        <a class="links" href="./winkelwagen.php" target="_blank">Winkelwagen(<?php if(isset($_SESSION["cartitems"])){
           echo count($_SESSION["cartitems"]);
          } else {
            echo "0";
          } ?>) &nbsp;<img
            src="../assets/iconen/cart.png" alt="winkelwagen"></a>
        <!--voor kleinere schermen alleen, klapt de links hiervoor uit-->
        <button class="icon" onclick="burgerOne()"><img src="../assets/iconen/hamburger.png" alt="hamburger"></button>
      </div>
      <div id="burgernav">
        <a class="burgerlinks" href="./schilderijen.php" target="_self">Schilderijen</a>
        <a class="burgerlinks" href="./tekeningen.php" target="_self">Tekeningen</a>
        <a class="burgerlinks" href="./kaarten.php" target="_self">Kaarten</a>
        <a class="burgerlinks" href="./dozen.php" target="_self">Dozen</a>
        <a class="burgerlinks" href="./accesoires.php" target="_self">Accessoires</a>
        <a class="burgerlinks" href="/loginpage.php" target="_blank">Inloggen &nbsp;<img
            src="../assets/iconen/usertwo.png" alt="inlogteken"></a>
        <a class="burgerlinks" href="./winkelwagen.php" target="_blank">Favorieten &nbsp;<img
            src="../assets/iconen/heart.png" alt="hartje"></a>
        <a class="burgerlinks" href="./winkelwagen.php" target="_blank">Winkelwagen&nbsp;<img
            src="../assets/iconen/cart.png" alt="winkelwagen"></a>
      </div>
    </div>