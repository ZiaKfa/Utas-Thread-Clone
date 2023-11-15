<?php
session_start();
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
//menambahkan modul fungsi
require_once("functions.php");
$username = $_POST["username"];
$password = $_POST["password"];

$user = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$username'");
//cek username
if(mysqli_num_rows($user) === 1){
    $row = mysqli_fetch_assoc($user);
    //cek password
    if(password_verify($password, $row["password"])){
        $_SESSION["login"] = true;
        $_SESSION["username"] = $row["username"];
        $_SESSION["id"] = $row["id"];
        $role = $row["role"];
        if($role == "admin"){
            $_SESSION["admin"] = true;
        }
        header("Location: index.php");
        exit;
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="eng">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="login.css" />
    <title>Login - Queasy</title>
  </head>
  <body>
  <a href="index.php" class="text-decoration-none text-dark"><button class="btn btn-outline-dark m-3 link">Back home</button></a>
    <form action="" method="POST">
    <div class="login d-flex justify-content-center align-items-center">
      <div class="container main w-75">
        <div class="row border rounded-4 shadow box-area">
        <!-- login left -->
          <div class="col-md-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #faf7f4">
            <div class="featured-image">
              <img src="img/login.jpg" alt="login" class="img-fluid" />
            </div>
          </div>
          <!-- login right -->
          <div class="col-md-8 rounded-start-4 right-box" style="background-color: #fcc822">
            <div class="header m-4">
              <h1>Qu<span>easy</span></h1>
            </div>
            <div class="content mx-5">
              <p>Welcome Back!</p>
              <small>Login to your account</small></p>
                <?php if(isset($error)) : ?>
                    <p><small>Incorrect username/password</small></p>
                <?php endif; ?>
              
              <label for="username" class="form-label mt-2 mb-1">Username</label>
              <input type="username" name="username" class="form-control" id="username" placeholder="Enter your username"/>

              <label for="password" class="form-label mt-2 mb-1">Password</label>
              <div class="group-input">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"/>
                <img id="passwordIcon" src="img/eye-solid.svg" alt="show" onclick="togglePassword()"/>
              </div>
              <div class="bottom-container">
                <p><small>Don't have an account?
                <a href="register.php" class="text-decoration-none">Sign up</a></small></p>
                <button class="next btn btn-outline-dark mt-3">Next</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    <script>
      function togglePassword() {
        const passwordField = document.getElementById("password");
        const passwordIcon = document.getElementById("passwordIcon");

        if (passwordField.type === "password") {
          passwordField.type = "text";
          passwordIcon.src = "img/eye-slash-solid.svg";
        } else {
          passwordField.type = "password";
          passwordIcon.src = "img/eye-solid.svg";
        }
      }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
