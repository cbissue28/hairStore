<?php
session_start();
require_once "config.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $result = mysqli_query($link,"SELECT * FROM `products` WHERE product_id=$product_id");
    $product_data = mysqli_fetch_assoc($result);
} else {
    // Handle the case when no product ID is provided
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    $product_id = $product_data['product_id']; // Assuming your product_id column name
    $name = $product_data['product_name'];
    $price = $product_data['product_price'];
    $image = $product_data['product_image']; // Use primary_image column here

    $cartArray = array(
        $product_id => array(
            'product_id' => $product_id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($product_id, $array_keys)) {
            foreach ($_SESSION["shopping_cart"] as $k => $v) {
                if ($product_id == $v["product_id"]) {
                    if (empty($_SESSION["shopping_cart"][$k]["quantity"])) {
                        $_SESSION["shopping_cart"][$k]["quantity"] = 0;
                    }
                    $_SESSION["shopping_cart"][$k]["quantity"] += $_POST["quantity"];
                }
            }
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
        }
    }

    // Redirect to the same product page to prevent form resubmission
    header("location: productPage.php?id=$product_id");
    exit;
}
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
          <div class="navbanner">
            <p class="banner"><i class="bi bi-truck"></i>Free UK delivery over £45</p>
            <p class="banner"><i class="bi bi-globe-americas"></i>Worlwide Delivery available</p>
            <p class="banner"><i class="bi bi-ticket-detailed"></i>Get 10% off first order</p>
            <p class="banner"><i class="bi bi-clock"></i>Sign up today!</p>
          </div>
        </div>
      </div>
    </nav>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="Images/<?php echo $product_data['secondary_image'] ?>" />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder" style="font-family: 'Trebuchet MS', sans-serif; font-size: 32px;"><?php echo $product_data['product_name'] ?></h1>
                    <div class="d-flex justify-content-left small text-warning mb-2">
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                    </div>
                    <div class="fs-5 mb-5" style="font-family: 'Trebuchet MS', sans-serif;">
                        <span>£<?php echo $product_data['product_price'] ?></span>
                    </div>
                    <p class="lead" style="font-family: 'Trebuchet MS', sans-serif; font-size: 16px;"><?php echo $product_data['product_description'] ?></p>

                    <form action="productPage.php?id=<?php echo $product_id ?>" method="post">
                        <div class="d-flex">
                            <input class="form-control text-center me-3" name="quantity" type="number" value="1" min="1" max="10" style="max-width: 4rem">
                            <button type="submit" class="btn btn-outline-dark flex-shrink-0">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!-- Footer -->
<div class="footer-container">
<footer class="text-center text-lg-start bg-light text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i><img src="Images/Logo.png" alt="" width="160" height="124">
          </h6>
          <p>
            We specialise in providing the best hair products for everybody.
          </p>
        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="shampoos.php" class="text-reset">Shampoo</a>
          </p>
          <p>
            <a href="conditioners.php" class="text-reset">Conditioners</a>
          </p>
          <p>
            <a href="haircreams.php" class="text-reset">Hair Creams</a>
          </p>
          <p>
            <a href="aboutus.php" class="text-reset">About Us</a>
          </p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Social Media
          </h6>
          <p>
            <a href="#!" class="text-reset">Instagram</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Twitter</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Facebook</a>
          </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> 345, Wheel Manor, Sheffield, S1 1AE</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            osahmail@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(222, 184, 135, 0.368);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">One Step A-Head</a>
  </div>
</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>