<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    if(!isset($_GET["quiz_id"])){
        header("Location: create_quiz.php");
    }

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
    <title>Create Question</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Question</td>
                <td><input type="text" name="quest_text"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">submit</button></td>
            </tr>
            <tr>
                <td>
                    <a href="index.php">Back</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $quest_text = $_POST["quest_text"];
        $quiz_id = $_GET["quiz_id"];
        $result = mysqli_query($mysqli, "INSERT INTO questions (quest_text, quiz_id) VALUES ('$quest_text', '$quiz_id')");
        if($result){
            header("Location: create_options.php?question_id=$mysqli->insert_id");
        }
    }
?>