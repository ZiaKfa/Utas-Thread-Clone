<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../login.php");
        exit;
    }
    if(!isset($_SESSION["admin"])){
        header("Location: ../index.php");
        exit;
    }
    $id = $_GET["id"];
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
    <style>
        h1 {
            text-align: center;
            margin: 3rem 0;
            font-weight: bold;
            color: #2c2a3b;
        }

        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
        }

        .card{
            width: 95%;
            margin: 0 auto 3rem;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #2c2a3b;
            resize: none;
        }

        select {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #2c2a3b;
        }

        button[type="submit"] {
            padding: 9px;
            background-color: #fcc822;
            color: #2c2a3b;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 60px;
        }

        button[type="submit"]:hover {
            background-color: #cea51c;
        }
    </style>
    <title>Edit</title>
</head>
<body>
    <!--form edit untuk user-->
    <?php if($table == "user") : ?>
        <h1>Edit User</h1>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $_GET["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $_GET["email"] ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Edit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
    <!--form edit untuk quiz-->
    <?php if($table == "quizzes") : ?>
        <h1>Edit Quiz</h1>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $_GET["title"] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="desc" cols="30" rows="4"><?php echo $_GET["desc"]?></textarea></td>
                </tr>
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
                    <td><button type="submit" name="submit">Edit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
    <?php if($table == "question") : ?>
        <h1>Edit Quiz</h1>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Question text</td>
                    <td><textarea name="quest_text" cols="30" rows="4"><?php echo $_GET["quest_text"]?></textarea></td>
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
                    <td><button type="submit" name="submit">Edit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
    <?php if($table == "option") : ?>
        <h1>Edit Option</h1>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Option text</td>
                    <td><input type="text" name="option_text" value="<?php echo $_GET["option_text"] ?>"></td>
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
                    <td><button type="submit" name="submit">Edit</button></td>
                </tr>
            </table>
        </form>
    <?php endif;?>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
    echo "submit terpost";
    if($table == "user"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $query = "UPDATE user SET username = '$username', email = '$email' WHERE id = '$id'";
        $result = mysqli_query($mysqli,$query);
        if($result){
            echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php?content=user';
            </script>";
        }
        } else if($table == "quizzes"){
            $title = $_POST["title"];
            $desc = $_POST["desc"];
            $query = "UPDATE quizzes SET title = '$title', description = '$desc' WHERE id = '$id'";
            $result = mysqli_query($mysqli,$query);
            if($result){
                echo "<script>
                    alert('Data berhasil diubah');
                    document.location.href = 'index.php?content=quiz&categ_id=".$_GET["categ_id"]."&name=".$_GET["categ_name"]."';
                </script>";
            }
        } else if($table == "question"){
            $quest_text = $_POST["quest_text"];
            $quiz = $_POST["quiz"];
            echo "quest_text: $quest_text, quiz: $quiz<br>";
            $query = "UPDATE questions SET quest_text = '$quest_text' WHERE id = '$id'";
            $result = mysqli_query($mysqli,$query);
            
            if($result){
                echo "<script>
                    alert('Data berhasil diubah');
                    document.location.href = 'index.php?content=questions&quiz_id=".$_GET["quiz_id"]."&quiz_title=".$_GET["quiz_title"]."';
                </script>";
            }
        } else if($table == "option"){
            $option_text = $_POST["option_text"];
            if ($_POST["is_answer"]){
                $is_answer = $_POST["is_answer"];
            } else {
                $is_answer = 0;
            }
            $query = "UPDATE options SET option_text = '$option_text', is_answer = '$is_answer' WHERE id = '$id'";
            $result = mysqli_query($mysqli,$query);
            if($result){
                echo "<script>
                    alert('Data berhasil diubah');
                    document.location.href = 'index.php?content=options&question_id=".$_GET["question_id"]."&quest_text=".$_GET["quest_text"]."';
                </script>";
            }
        }
    }

?>