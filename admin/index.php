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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Ini adalah laman admin</h1>
    <a href="../logout.php">Logout disini</a>
    <a href="view_user.php">Tabel User</a>
    <a href="view_category.php">Tabel Category</a>
    <a href="view_quiz.php">Tabel Quiz</a>
    <a href="view_question.php">Tabel Question</a>
    <a href="view_option.php">Tabel Option</a>
</body>
</html>