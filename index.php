<?php
session_start();
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="eng">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
      crossorigin="anonymous"
    />
    <!-- Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
      rel="stylesheet"
    />
    <!-- icon css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="index.css" />
    <link rel="icon" href="img/q!.ico" type="image/x-icon">

    <title>Queasy - Welcome!</title>
  </head>
  <body class="bg-body-tertiary">
    <!-- Navbar -->
<?php
    include("navbar.php");
?>
    <!-- Category -->
<?php
  if(isset($_SESSION["login"])){
    include("category.php");
  }  
?>

    <!-- Hero -->
    <?php if(!isset($_SESSION["login"])) : ?>
    <div class="hero bg-body-tertiary">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 m-auto hero">
              <h1 class="hero-title">"Test Your Brain<br>With Queasy!"</h1>
              <p class="hero-text">A quiz platform that helps you to test your knowledge and improve your skills</p>
              <a href="#frame3"><button type="button" class="btn btn-outline-dark btn-warning shadow">Get Started</button></a>
              <a href="register.php"><button type="button" class="btn btn-outline-dark btn-light shadow sign">Sign Up</button></a>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 image-hero">
              <img src="img/hero.png" alt="hero" class="hero-img" />
            </div>
            </div>
        </div>
    </div>

    <!-- Frame 2 -->
    <img src="img/wave-top.svg" alt="wave-top">
    <div class="frame2">
      <div class="container">
        <div class="row">
          <h1>How to Play</h1>
          <p>Discover the steps to kickstart your quiz journey. Learn the rules, answer questions, and aim for victory. Let's make your quiz experience enjoyable and successful!</p>
        </div>
        <div class="row d-flex justify-content-around align-content-center">
          <div class="card bg-body-tertiary shadow rounded-4" style="width: 18rem;">
            <img src="img/step1.jpg" class="card-img-top mt-3" alt="img/step1.jpg">
            <div class="card-body">
              <h5 class="card-title">Step 1</h5>
              <p class="card-text">Register or login to your account</p>
            </div>
          </div>
          <div class="card bg-body-tertiary shadow rounded-4" style="width: 18rem;">
            <img src="img/step2.jpg" class="card-img-top mt-3" alt="img/step1.jpg">
            <div class="card-body">
              <h5 class="card-title">Step 2</h5>
              <p class="card-text">Select the quiz category you want to do</p>
            </div>
          </div>
          <div class="card bg-body-tertiary shadow rounded-4" style="width: 18rem;">
            <img src="img/step3.jpg" class="card-img-top mt-3" alt="img/step1.jpg">
            <div class="card-body">
              <h5 class="card-title">Step 3</h5>
              <p class="card-text">Start taking the quiz by choosing the correct answer </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="img/wave-bot.svg" alt="wave-bot">

    <!-- Frame 3 -->
    <div class="frame3 min-vh-100" id="frame3">
      <div class="container">
        <div class="row text-center">
          <h1>Play anywhere and anytime</h1>
          <p>Play on your own or with friends, at home or in class, with a teacher or independently</p>
        </div>
        <div class="row pt-4 text-center">
          <div class="col-lg-4">
            <span class="lingkaran shadow"><i class="fa-solid fa-house-chimney fa-5x"></i></span>
            <p class="mt-4 fw-semibold m-auto">Queasy at Home</p>
            <p class="m-auto">Play as a game for enjoyable family pastime or friends.</p>
          </div> 
          <div class="col-lg-4">
            <span class="lingkaran shadow"><i class="fa-solid fa-school fa-5x"></i></span>
            <p class="mt-4 fw-semibold m-auto">Queasy at School</p>
            <p class="m-auto">Involving educators and learners in collaborative online and offline learning experiences.</p>
          </div>
          <div class="col-lg-4">
            <span class="lingkaran shadow"><i class="fa-solid fa-briefcase fa-5x"></i></span>
            <p class="mt-4 fw-semibold m-auto">Queasy at Work</p>
            <p class="m-auto">Make training, ice breaking, or presentations at work more fun.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Frame 4 -->
    <div class="frame4 bg-body-secondary">
      <h1 class="text-center pt-5">Queasy for everyone</h1>
      <p class="text-center">Simplify learning and collaboration for students, teachers, and professionals worldwide.</p>
        <div id="carouselExampleCaptions" class="carousel slide w-75 m-auto mt-5" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active"  data-bs-interval="4000">
              <img src="img/item1.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4>For Teachers</h4>
                <p class=" text-light fw-light">Embrace the comprehensive, widely admired tool for engagement, instruction, evaluation, and revision that has gained millions of global enthusiasts.</p>
              </div>
            </div>
            <div class="carousel-item"  data-bs-interval="4000">
              <img src="img/item2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4>For Students</h4>
                <p class=" text-light fw-light">New school year, new smart ways to study! Ease your way back to school with flashcards, study groups, goal setting, and our newest features.</p>
              </div>
            </div>
            <div class="carousel-item"  data-bs-interval="4000">
              <img src="img/item3.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4>For Family and Friends</h4>
                <p class=" text-light fw-light">Elevate Your Gatherings with Friends and Family using Queasy! Host thrilling gatherings! Access high-quality, pre-made games or effortlessly craft your own</p>
              </div>
            </div>
            <div class="carousel-item"  data-bs-interval="4000">
              <img src="img/item4.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4>For Professionals</h4>
                <p class="text-light fw-light">Revolutionize your training and presentations in an instant with interactive quiz questions, dynamic word clouds, and brainstorming sessions!</p>
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
    <?php endif ?>
    <footer class="max-vw-100">
      <div class="container">
        <div class="row d-flex align-items-center py-4 px-5 max-vw-100">
          <div class="col-4 logo m-auto">
            <p>Qu<span>easy</span></p>
          </div>
          <div class="col-4 m-auto">
            <div class="f-head mb-2">MENU</div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">About</a></div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Services</a></div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Blog</a></div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Contact</a></div>
          </div>
          <div class="col-4 m-auto">
            <div class="f-head mb-2">FOLLOW US</div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Instagram</a></div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Twitter</a></div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Facebook</a></div>
            <div class="mb-2 f-text"><a href="#" class="text-decoration-none">Youtube</a></div>
          </div>
        </div>
        <div class="row max-vw-100">
          <hr class="text-warning border-3">
          <div class="col text-center text-warning">
            <span>&copy; 2023 Qu<span>easy</span>. All Rights Reserved.</span>
          </div>
        </div>
      </div>
    </footer>
      

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
