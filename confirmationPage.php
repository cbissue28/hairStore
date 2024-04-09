<?php
    session_start();
    require_once "config.php";

    // Clear the shopping cart
    unset($_SESSION["shopping_cart"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- metadata -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>One Step A-Head</title>
    <link rel = "icon" href = 
"Images/Logo.png" 
        type = "image/x-icon">
<!-- cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!--custom css -->
<link rel="stylesheet" type="text/css" href="CSS/Homepage.css">
</head>

<body>
<!-- header -->
  <div class="container">
    <section class="header-main border-bottom bg-white">
      <div class="container-fluid d-flex align-items-center">
        <a class="navbar-brand me-3" href="index.php">
          <img src="Images/Logo.png" alt="" width="160" height="124" class="d-inline-block align-text-middle">
          ONE STEP A-HEAD
        </a>
        <form class="d-flex flex-grow-1" role="search">
          <input class="form-control me-2 flex-grow-1" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <div class="d-flex align-items-center">
            <?php if (!isset($_SESSION["loggedin"])) { ?>
                <a href="loginPage.php" style="color: inherit;">
                       <h4 class="me-3"><i class="bi bi-person"></i></h4>
                </a>
                <h4><a href="shoppingCart.php" class="me-3" style="color: inherit;"><i class="bi bi-cart3"></i></a></h4>
            <?php } ?>
    
            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>              
                <h4><a href="logoutPage.php" style="color: inherit;"><i class="bi bi-person-x"></i></a></h4>
                <h4><a href="shoppingCart.php" class="me-3" style="color: inherit;"><i class="bi bi-cart3"></i></a></h4>
            <?php } ?>
        </div>
      </div>
    </section>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="shampoos.php">Shampoos</a>
            <a class="nav-link" href="conditioners.php">Conditioners</a>
            <a class="nav-link" href="haircreams.php">Hair creams</a>
            <a class="nav-link" href="aboutus.php">Who are we?</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="border border-3 border-secondary"></div>
            <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Order Confirmed</h1>
                    <p>Thank you for shopping with us</p>
                    <a href="index.php"><button class="btn btn-outline-secondary">Back Home</button></a>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>