<?php
    session_start();
    require_once("../functions.php");
    if(!isset($_SESSION["login"])){
        header("Location: ../login.php");
        exit;
    }
    if(!isset($_SESSION["admin"])){
        header("Location: ../index.php");
        exit;
    }

    $table = $_GET["table"];
    $user_query = mysqli_query($mysqli, "SELECT * FROM user");
    $category_query = mysqli_query($mysqli, "SELECT * FROM category");
    $quiz_query = mysqli_query($mysqli, "SELECT * FROM quizzes");
    $question_query = mysqli_query($mysqli, "SELECT * FROM questions");
    $option_query = mysqli_query($mysqli, "SELECT * FROM options");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <!--form submit untuk quiz-->
    <?php if($table == "quizzes") : ?>
        <p>Create Quiz</p>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="desc" cols="30" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><select name="category" id="category">
                        <?php
                            while($category = mysqli_fetch_assoc($category_query)){
                                echo "<option value='".$category["id"]."'";
                                    if ($category["id"] == $_GET["categ_id"]){
                                        echo "selected";
                                    }
                                echo ">".$category["category_name"]."</option>";
                            }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Pembuat</td>
                    <td><select name="creator" id="creator">
                        <?php
                            while($creator = mysqli_fetch_assoc($user_query)){
                                echo "<option value='".$creator["id"]."'>".$creator["username"]."</option>";
                            }
                        ?>
                    </select></td>
                </tr>    
                <tr>
                    <td><button type="submit" name="submit">submit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>

    <?php if($table == "questions") : ?>
        <p>Create Question</p>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Question text</td>
                    <td><textarea name="quest_text" cols="30" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td>Quiz</td>
                    <td><select name="quiz" id="quiz">
                        <?php
                            while($quiz = mysqli_fetch_assoc($quiz_query)){
                                echo "<option value='".$quiz["id"]."'";
                                    if($quiz["id"] == $_GET["quiz_id"]){
                                        echo "selected";
                                    }
                                echo ">".$quiz["title"]."</option>";
                            }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">submit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
    <?php if($table == "options") : ?>
        <p>Create Option</p>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Option text</td>
                    <td><input type="text" name="option_text"></td>
                </tr>
                <tr>
                    <td>Is answer</td>
                    <td><input type="checkbox" name="is_answer" value="1">Benar</td>
                </tr>
                <tr>
                    <td>Question</td>
                    <td><select name="question" id="question">
                        <?php
                            while($question = mysqli_fetch_assoc($question_query)){
                                echo "<option value='".$question["id"]."'";
                                    if($question["id"] == $_GET["question_id"]){
                                        echo "selected";
                                    }
                                echo ">".$question["quest_text"]."</option>";
                            }
                        ?>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">submit</button></td>
                </tr>
            </table>
        </form>
    <?php endif;?>
</body>
</html>

<?php
    if (isset($_POST["submit"])){
        if ($table == "quizzes"){
            $title = $_POST["title"];
            $desc = $_POST["desc"];
            $category = $_POST["category"];
            $creator = $_POST["creator"];
            $result = mysqli_query($mysqli, "INSERT INTO quizzes(title, description, category_id, creator_id) VALUES('$title', '$desc', '$category', '$creator')");
            if($result){
                echo "<script>
                        alert('Quiz berhasil dibuat');
                    </script>";
                header("Location: view_quiz.php?categ_id=".$_GET["categ_id"]."&name=".$_GET["categ_name"]."");
            }else{
                echo "<script>
                        alert('Quiz gagal dibuat');
                    </script>";
            }
       } else if ($table == "questions"){
            $quest_text = $_POST["quest_text"];
            $quiz = $_POST["quiz"];
            $result = mysqli_query($mysqli, "INSERT INTO questions(quest_text, quiz_id) VALUES('$quest_text', '$quiz')");
            if($result){
                echo "<script>
                        alert('Question berhasil dibuat');
                    </script>";
                header("Location: view_question.php?quiz_id=".$_GET["quiz_id"]."&quiz_name=".$_GET["quiz_name"]."");
            }else{
                echo "<script>
                        alert('Question gagal dibuat');
                    </script>";
            }
       } else if ($table == "options"){
            $option_text = $_POST["option_text"];
            if ($_POST["is_answer"]){
                $is_answer = $_POST["is_answer"];
            } else {
                $is_answer = 0;
            }
            $question = $_POST["question"];
            $result = mysqli_query($mysqli, "INSERT INTO options(option_text, is_answer, question_id) VALUES('$option_text', '$is_answer', '$question')");
            if($result){
                echo "<script>
                        alert('Option berhasil dibuat');
                    </script>";
                header("Location: view_option.php?question_id=".$_GET["quest_id"]."&question_text=".$_GET["quest_text"]."");
            }else{
                echo "<script>
                        alert('Option gagal dibuat');
                    </script>";
            }
       }
}
?>