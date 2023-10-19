
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

    if(isset($_GET["table"]) && isset($_GET["id"])){
        $table = $_GET["table"];
        $id = $_GET["id"];
        $query = "DELETE FROM $table WHERE id = $id";
        $result = mysqli_query($mysqli, $query);
        if($result){
            if($table == "user"){
                header("Location: view_user.php");
            }else if($table == "quizzes"){
                header("Location: view_quiz.php");
            }
        }
    }

?>