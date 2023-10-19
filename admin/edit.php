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
    $id = $_GET["id"];
    $table = $_GET["table"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <!--form edit untuk user-->
    <?php if($table == "user") : ?>
        <p>Edit User</p>
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
                    <td><button type="submit" name="edit">Edit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
    <!--form edit untuk quiz-->
    <?php if($table == "quizzes") : ?>
        <p>Edit Quiz</p>
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
                <tr>
                    <td><button type="submit" name="edit">Edit</button></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>
</html>
<?php
    if(isset($_POST["edit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        if($table == "user"){
            $query = "UPDATE user SET username = '$username', email = '$email' WHERE id = '$id'";
            $result = mysqli_query($mysqli,$query);
            if($result){
                header("Location: view_user.php");
            }
        } else if($table == "quizzes"){
            $query = "UPDATE quizzes SET title = '$title', description = '$desc' WHERE id = '$id'";
            $result = mysqli_query($mysqli,$query);
            if($result){
                header("Location: view_quiz.php");
            }
        }
        
    }