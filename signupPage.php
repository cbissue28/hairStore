<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate username
  if (empty(trim($_POST["username"]))) {
      $username_err = "Please enter a username.";
  } elseif (!preg_match('/^[a-zA-Z_]*[0-9]+[a-zA-Z0-9_]*$/', trim($_POST["username"]))) {
      $username_err = "Username must contain at least one number.";
  } else {
      $username = trim($_POST["username"]);

      // Check if the username already exists in the database
      $sql = "SELECT user_id FROM users WHERE username = '$username'";
      $result = mysqli_query($link, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
          $username_err = "This username is already taken.";
      }
  }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
        } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
         $email_err = "Invalid email format.";
        } else {
        $email = trim($_POST["email"]);

      // Check if the email already exists in the database
      $sql = "SELECT user_id FROM users WHERE email = '$email'";
      $result = mysqli_query($link, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
          $email_err = "This email is already registered.";
      }
  }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: loginPage.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

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
          <h4 class="me-3"><i class="bi bi-person"></i></h4>
          <h4><a href="shoppingCart.php" class="me-3" style="color: inherit;"><i class="bi bi-cart3"></i></a></h4>
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

    <body>
    <section class="vh-100 background" style="background-color: rgba(222, 184, 135, 0.368); margin-left: -12%; margin-right: -12%;">
    <div class="container h-100">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-4">
                    <img src="Images/Logo.png" alt="logo" width="150">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4 loginfont">Sign Up</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <label class="mb-2 text-muted loginfont" for="username">Username</label>
                                <input id="username" type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" name="username" value="<?php echo $username; ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo $username_err; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted loginfont" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo $email; ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo $email_err; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted loginfont" for="password">Password</label>
                                <input id="password" type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="password" maxlength="10" required>
                                <div class="invalid-feedback">
                                    <?php echo $password_err; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted loginfont" for="confirm_password">Confirm Password</label>
                                <input id="confirm_password" type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" name="confirm_password" maxlength="10" required>
                                <div class="invalid-feedback">
                                    <?php echo $confirm_password_err; ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-mute ms-auto loginfont" style="background-color: rgba(222, 184, 135, 0.368); color: black;">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center loginfont">
                            Already have an account? <a href="loginPage.php" class="text-dark loginfont">Sign In Here</a>
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