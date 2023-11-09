<?php
    session_start();
    include("functions.php");
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    $quizid = $_GET["id"];
    $userid = $_SESSION["id"];
    $username = $_SESSION["username"];
    $user_query = mysqli_query($mysqli, "SELECT * FROM user WHERE id = $userid");
    $user = mysqli_fetch_assoc($user_query);
    $result = mysqli_query($mysqli, "SELECT * FROM quizzes WHERE id = $quizid");
    $row = mysqli_fetch_assoc($result);
    $title = $row["title"];
    $desc = $row["description"];
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="icon" href="img/q!.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="quiz.css">

    <title>Queasy - Quiz</title>
  </head>
  <body>
    <form action="" method="post">
      <?php
      include("navbar.php");
      echo "<h2 class='text-center mt-5'>$title</h2>";
      echo "<p class='text-center'>$desc</p>";
      echo "<p class='text-center'>Created by $user[username]</p>";
      $num = 1;
      $result2 = mysqli_query($mysqli, "SELECT * FROM questions WHERE quiz_id = $quizid");
      while($row2 = mysqli_fetch_assoc($result2)){
        echo "<p class='text-center mt-5'>$num. $row2[quest_text]</p>";
        $result3 = mysqli_query($mysqli, "SELECT * FROM options WHERE question_id = $row2[id]");
        $alphabet = "A";
        while($row3 = mysqli_fetch_assoc($result3)){
          echo "<div class='container d-flex justify-content-center align-items-center fs-5'>";
          echo "<div class='form-check w-50'>";
          echo "<input type='radio' name='$row2[id]' value='$row3[id]'>";
          echo "<button class='answer btn btn-light ms-2'>$alphabet. $row3[option_text]</button>";
          echo "</div>";
          echo "</div>";
          $alphabet++;
        }
        $num++;
      }
      
      ?>

<!-- ... (Rest of the HTML code) ... -->

    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
