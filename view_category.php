<?php
    session_start();
    require_once("functions.php");
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    $id = $_GET["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>

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

</head>
<body class="overflow-x-hidden">
    <?php
        include("navbar.php");
        $name_category = mysqli_query($mysqli, "SELECT * FROM category WHERE id = $id");
        $row = mysqli_fetch_assoc($name_category);
        echo '<div class="container my-4 text-center">';
        echo '<h1> '.$row["category_name"].'</h1>';
        echo '</div>';
    ?>
    <div class="d-flex justify-content-around">
    <?php
        $category = mysqli_query($mysqli, "SELECT * FROM category WHERE id = $id");
        $row_categ = mysqli_fetch_assoc($category);
        $result = mysqli_query($mysqli, "SELECT * FROM quizzes WHERE category_id = $id");
        echo '<div class="row me-5 min-vh-100">';
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="col-3 mb-5 mt-2">';
            echo '<a href="quiz.php?id='.$row["id"].'" class="text-decoration-none">';
            echo '<div class="kartu card shadow" style="width: 16rem;">';
            echo '<img src="img/'.$row_categ['img'].'" class="card-img-top mt-2" alt="img/'.$row_categ['img'].'">';
            echo '<div class="card-body">';
            echo "<p class='card-text'>$row[title]</p>";
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
        echo '</div>';
    
    ?>
    </div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
></script>
</body>
</html>