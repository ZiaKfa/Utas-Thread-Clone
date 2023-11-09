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


    <link rel="stylesheet" href="index.css" />
    <link rel="icon" href="img/q!.ico" type="image/x-icon">
    <title>Create Options</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Option</td>
                <td><input type="text" name="option_text"></td>
            </tr>
            <tr>
                <td>Is Correct</td>
                <td><input type="checkbox" name="is_correct"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">submit</button></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="index.php">Done</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $option_text = $_POST["option_text"];
        $is_correct = $_POST["is_correct"];
        $result = mysqli_query($mysqli, "INSERT INTO options (option_text, is_correct, question_id) VALUES ('$option_text', '$is_correct', '$question_id')");
        if($result){
            echo "<script>alert('Option created successfully!')</script>";
        }
    }
?>
