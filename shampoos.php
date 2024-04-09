<?php
    session_start();
    require_once "config.php";

    $shampoos = mysqli_query($link,"SELECT * FROM `products` WHERE cat_id=1 ");
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
            <a class="nav-link" href="">Shampoos</a>
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

<!-- Shampoos -->
<h4 class="titles">SHAMPOOS</h4>

<div class="d-flex justify-content-center align-items-center mt-5"> 
  <button type="button" class="btn custom-btn" id="btn-all">ALL</button>
  <button type="button" class="btn custom-btn" id="btn-clarifying">CLARIFYING</button>
  <button type="button" class="btn custom-btn" id="btn-moisturizing">MOISTURIZING</button>
</div> 

<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="shampoo-card-container">
      <?php while ($row = mysqli_fetch_assoc($shampoos)) { ?>
        <div class="col mb-5" data-category="<?php echo $row['product_tag']; ?>">
          <div class="card h-100">
            <a href="productPage.php?id=<?php echo $row['product_id'] ?>"><img class="card-img-top" src="Images/<?php echo $row['product_image']; ?>" alt="..." /></a>
            <div class="card-body p-4">
              <div class="text-center">
                <a href="productPage.php?id=<?php echo $row['product_id'] ?>" class="product-link"><h7 class="fw-bolder"><?php echo $row['product_name']; ?></h7></a>
                <div class="d-flex justify-content-center small text-warning mb-2">
                  <div class="bi-star-fill"></div>
                  <div class="bi-star-fill"></div>
                  <div class="bi-star-fill"></div>
                  <div class="bi-star-fill"></div>
                  <div class="bi-star-fill"></div>
                </div>
                £<?php echo $row['product_price']; ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
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
<script>
  document.addEventListener("DOMContentLoaded", function() {
    function filterCards(cards, category) {
      cards.forEach((card) => {
        const cardCategory = card.getAttribute("data-category");
        card.style.display = (cardCategory === category || category === "all") ? "block" : "none";
      });
    }

    const btnAllShampoos = document.getElementById("btn-all");
    const btnClarifying = document.getElementById("btn-clarifying");
    const btnMoisturizing = document.getElementById("btn-moisturizing");

    const shampooCards = Array.from(document.querySelectorAll("#shampoo-card-container .col"));

    btnAllShampoos.addEventListener("click", () => {
      filterCards(shampooCards, "all");
    });

    btnClarifying.addEventListener("click", () => {
      filterCards(shampooCards, "clarifying");
    });

    btnMoisturizing.addEventListener("click", () => {
      filterCards(shampooCards, "moisturizing");
    });
  });
</script>
</body>
</html>