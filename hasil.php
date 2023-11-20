<?php
    require_once("functions.php");
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
    echo "you got ".$_SESSION['score']." score<br>";
    echo "you got ".$_SESSION['correct']." correct answer out of ".$_SESSION['question_num']." question<br>";
    print_r($_SESSION['incorrect']);
    $incorrect_querry = "SELECT * FROM questions WHERE id IN (".implode(',',array_keys($_SESSION['incorrect'])).")";
    $incorrect_result = mysqli_query($mysqli,$incorrect_querry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php
        while($row = mysqli_fetch_assoc($incorrect_result)){
            echo "<br>".$row['quest_text'];
            $correct = mysqli_query($mysqli,"SELECT * FROM options WHERE question_id = '$row[id]' AND is_answer = 1");
            $correct = mysqli_fetch_assoc($correct);
            echo "<br>correct answer is ".$correct['option_text'];
        } 
    ?>
</body>
</html>