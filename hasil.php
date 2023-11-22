<?php
    require_once("functions.php");
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
    if(isset($_SESSION['incorrect']) && !empty($_SESSION['incorrect'])){
        
        $incorrect_querry = "SELECT * FROM questions WHERE id IN (".implode(',',array_keys($_SESSION['incorrect'])).")";
        $incorrect_result = mysqli_query($mysqli,$incorrect_querry);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .question {
            margin-bottom: 10px;
        }
        .correct-answer {
            color: green;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 7px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 0px 0px 0px #000000;
            background: #FFC822;
            border-radius: 1px;
            border: 0px solid #000000;
            }
            input[type=range]::-webkit-slider-thumb {
            box-shadow: 0px 0px 0px #000000;
            border: 1px solid #000000;
            height: 18px;
            width: 18px;
            border-radius: 25px;
            background: #FFC822;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -6px;
            }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h1>Quiz Result</h1>
        <p>You got <?php echo $_SESSION['score']; ?> score</p>
        <p>You got <?php echo $_SESSION['correct']; ?> correct answer out of <?php echo $_SESSION['question_num']; ?> questions</p>
        <form action="">
            <label for="akurasi">Accuration</label><br>
            <input type="range" class="form-range w-75" value="<?php echo $_SESSION['correct'];?>" name="akurasi" min="0" max="<?php echo $_SESSION['question_num']; ?>" disabled>

        </form>
        <?php
            if (isset($_SESSION['incorrect'])&& !empty($_SESSION['incorrect'])){
                echo "<h2>The Correct Answer:</h2>";
            }
        ?>
        <?php
            if(isset($_SESSION['incorrect']) && !empty($_SESSION['incorrect'])){
                while($row = mysqli_fetch_assoc($incorrect_result)){
                echo "<div class='question'>";
                echo "<p>".$row['quest_text']."</p>";
                $correct = mysqli_query($mysqli,"SELECT * FROM options WHERE question_id = '$row[id]' AND is_answer = 1");
                $correct = mysqli_fetch_assoc($correct);
                echo "<p class='correct-answer'>Correct answer is ".$correct['option_text']."</p>";
                echo "</div>";
            }
            }
        ?>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
</body>
</html>
