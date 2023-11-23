<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    if(!isset($_GET["question_id"])){
        header("Location: create_quiz.php");
    }
    $question_id = $_GET["question_id"];
    $quiz_id = $_GET["quiz_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    <link rel="stylesheet" href="create.css">

    <link rel="stylesheet" href="index.css" />
    <link rel="icon" href="img/q!.ico" type="image/x-icon">
    <title>Create Options</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="card w-50 m-auto shadow mt-5">
        <h2 class="text-center fw-semibold mt-4 mb-3">Create Options</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Option</td>
                    <td><input type="text" name="option_text"></td>
                </tr>
                <tr>
                    <td>Is Correct</td>
                    <td><input type="checkbox" name="is_correct" value="1"></td>
                </tr>
            </table>
            <div class="button mx-4 my-3 text-center">
                <button type="submit" name="submit" class="col-3 mx-3">Next Option</button>
                <button type="submit" name="next" class="col-3 mx-3">Next Question</button>
                <button class="btn btn-dark my-4 py-2 col-3 mx-3">
                    <a href="index.php" class="text-light text-decoration-none">Done!</a>
                </button>
            </div>
        </form>
    </div>
    
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $option_text = $_POST["option_text"];
        $is_correct = $_POST["is_correct"];
        $result = mysqli_query($mysqli, "INSERT INTO options (option_text, is_answer, question_id) VALUES ('$option_text', '$is_correct', '$question_id')");
        if($result){
            echo "<script>alert('Option created successfully!')</script>";
        }
    }else if(isset($_POST["next"])){
        $option_text = $_POST["option_text"];
        $is_correct = $_POST["is_answer"];
        $result = mysqli_query($mysqli, "INSERT INTO options (option_text, is_answer, question_id) VALUES ('$option_text', '$is_correct', '$question_id')");
        if($result){
            echo "<script>alert('Option created successfully!')
            window.location.href='create_questions.php?quiz_id=$quiz_id'
            </script>";
        }
    }
?>