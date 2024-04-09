<?php
    
    ob_start();
    
    session_start();
    require_once "config.php";

    $shampoos = mysqli_query($link,"SELECT * FROM `products` WHERE product_id >= 1 AND product_id <= 4");
    $conditioners = mysqli_query($link,"SELECT * FROM `products` WHERE product_id >= 9 AND product_id <= 12");
    $hair_creams = mysqli_query($link,"SELECT * FROM `products` WHERE product_id >= 17 AND product_id <= 20");
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
        <a class="navbar-brand me-3" href="#">
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
            <a class="nav-link active" aria-current="page" href="">Home</a>
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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="shampoos.php"> <img src="Images/clarshampoo.png" class="d-block w-100" alt="..." style="height: 490px;"> </a>
          <div class="carousel-caption d-none d-md-block">
            <h3 class="captionbackground">Check out the new range of clarifying shampoos available</h3>
          </div>
        </div>
        <div class="carousel-item">
          <a href="conditioners.php"> <img src="Images/newimage.png" class="d-block w-100" alt="..." style="height: 490px;"> </a>
          <div class="carousel-caption d-none d-md-block">
            <h3 class="captionbackground">The best leave-in conditioners for all hair types</h3>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  
<!--Shampoos -->
<h4 class="titles">SHAMPOOS</h4>

<div class="d-flex justify-content-center align-items-center mt-5"> 
<a href="shampoos.php"><button type="button" class="btn custom-btn"> SEE ALL</button></a>
</div> 

<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <?php while ($row = mysqli_fetch_assoc($shampoos)) { ?>
        <div class="col mb-5">
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

<!-- Conditioners -->
<h4 class="titles">CONDITIONERS</h4>

<div class="d-flex justify-content-center align-items-center mt-5"> 
  <a href="conditioners.php"><button type="button" class="btn custom-btn">SEE ALL</button></a>
</div> 

<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <?php while ($row = mysqli_fetch_assoc($conditioners)) { ?>
        <div class="col mb-5">
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

<!-- Hair Creams -->
<h4 class="titles">HAIR CREAMS</h4>

<div class="d-flex justify-content-center align-items-center mt-5"> 
  <a href="haircreams.php"><button type="button" class="btn custom-btn">SEE ALL</button></a>
</div> 

<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <?php while ($row = mysqli_fetch_assoc($hair_creams)) { ?>
        <div class="col mb-5">
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

<!-- Videos For You -->
<h4 class="titles">VIDEOS FOR YOU</h4>
<p id="videocaption">Videos to help you make a decision</p>


<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtube.com/embed/QVXmYX4gf3o" allowfullscreen></iframe>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/E1SZyl8WL1g" allowfullscreen></iframe>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtube.com/embed/hiO5GFIxXq0" allowfullscreen></iframe>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtube.com/embed/Xu7jBbKQdWk" allowfullscreen></iframe>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtube.com/embed/81ssrpRlOck" allowfullscreen></iframe>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtube.com/embed/W8Tg8Qj9TCg" allowfullscreen></iframe>
        </div>
    </div>
  </div>
</div>

<!-- About Us -->
<div class="aboutus-container">
   <div class="aboutussection">
    <div class="my-image">
      <img src="Images/aboutusimage.png" class="img-fluid" alt="...">
    </div>
    <div class="my-text">
      <h1>About Us</h1>
      <p>Here at One Step A-Head we believe everybody has the right to be proud of their hair
        and have access to the best products in order to maintain it. We source our products from 
        all around the world and make sure our customers are able to get the best products right at their
        door.</p>
        <br><p>After identifying the lack of high quality natural hair products in stores around his native UK,
            Jordan Simmons was inspired to provide that option for people in the UK and so in 2015 One Step A-Head was born. </p></br>
   </div>
</div>

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
              <a href="shampoos.php" class="text-reset">Shampoos</a>
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
</script>

</body>
</html>