<?php
session_start();
require_once "config.php";

$status = "";

if (isset($_POST['remove'])) {
    $removeProductId = $_POST['remove'];
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($removeProductId == $value['product_id']) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"])) {
                unset($_SESSION["shopping_cart"]);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['code'] === $_POST["code"]) {
            $value['quantity'] = $_POST["quantity"];
            break;
        }
    }
}

if (isset($_POST['checkout'])) {
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      // Insert purchase details into sale_history table
      $user_id = $_SESSION["user_id"];

      foreach ($_SESSION["shopping_cart"] as $product) {
          $product_name = $product['name'];
          $quantity = $product['quantity'];
          $price = $product['price'];

          // Insert data into sale_history table
          $insert_query = "INSERT INTO sale_history (user_id, product, quantity, price) VALUES (?, ?, ?, ?)";
          $stmt = mysqli_prepare($link, $insert_query);
          mysqli_stmt_bind_param($stmt, "issd", $user_id, $product_name, $quantity, $price);
          mysqli_stmt_execute($stmt);
      }

      // Clear the shopping cart
      unset($_SESSION["shopping_cart"]);

      // Redirect to confirmation page
      header("location: confirmationPage.php");
      exit;
  } else {
      // Redirect to login page for logged-out users
      header("location: loginPage.php");
      exit;
  }
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
            <?php } ?>
    
            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>              
                <h4><a href="logoutPage.php" style="color: inherit;"><i class="bi bi-person-x"></i></a></h4>
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

    <section class="h-100 h-custom" style="background-color: rgba(222, 184, 135, 0.368); margin-left: -6%; margin-right: -6%;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col-lg-7">
                                <h5 class="mb-3">
                                    Shopping Cart</h5>
                                <hr>
                                <?php
                                if (isset($_SESSION["shopping_cart"])) {
                                    foreach ($_SESSION["shopping_cart"] as $key => $product) {
                                ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="Images/<?php echo $product["image"]; ?>"
                                                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6><?php echo $product["name"]; ?></h6>
                                                        <p class="small mb-0">£<?php echo $product["price"]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 100px;">
                                                        <h7 class="fw-normal mb-0">Quantity: <?php echo $product["quantity"]; ?></h7>
                                                    </div>
                                                    <?php 
                                                      $total_price = $product["price"] * $product["quantity"];
                                                      $formatted_total_price = number_format($total_price, 2);
                                                     ?>
                                                    <div style="width: 80px;">
                                                        <h6 class="mb-0">£<?php echo $formatted_total_price; ?></h6>
                                                    </div>
                                                    <button type="submit" name="remove" class="btn btn-link" value="<?php echo $product['product_id']; ?>">
                                                        <i class="bi bi-x-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    }
                                } else {
                                ?>
                                <tr><td>There are no items in your cart</td></tr>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="col-lg-5">
                                <?php if(isset($_SESSION["shopping_cart"])) { ?>
                                <div class="card text-white rounded-3" style="background-color: rgba(238, 235, 235, 0.776);">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0" style="color: black;">Summary</h5>
                                            <img src="Images/Logo.png"
                                                class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                        </div>

                                        <hr class="my-4">

                                        <?php
                                          $subtotal = 0;
                                          foreach ($_SESSION["shopping_cart"] as $product) {
                                              $subtotal += $product["price"] * $product["quantity"];
                                          }
                                          $shipping = 3.50;
                                          $total = $subtotal + $shipping;
                                        ?>

                                        <div class="d-flex justify-content-between" style="color: black;" >
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">£<?php echo number_format($subtotal, 2); ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between" style="color: black;">
                                            <p class="mb-2">Shipping</p>
                                            <p class="mb-2">£<?php echo number_format($shipping, 2); ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4" style="color: black;">
                                            <p class="mb-2">Total</p>
                                            <p class="mb-2">£<?php echo number_format($total, 2); ?></p>
                                        </div>

                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                             <button type="submit" class="btn btn-info btn-block btn-lg" style="background-color:skyblue" name="checkout">
                                             <div class="d-flex justify-content-between">
                                             <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                             </div>
                                               </button>
                                        </form>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>