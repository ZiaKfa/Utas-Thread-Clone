
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
                header("Location: view_quiz.php?categ_id=".$_GET["categ_id"]."&name=".$_GET["categ_name"]."");
            } else if($table == "questions"){
                header("Location: view_question.php?quiz_id=".$_GET["quiz_id"]."&quiz_name=".$_GET["quiz_name"]."");
            } else if($table == "options"){
                header("Location: view_option.php?question_id=".$_GET["question_id"]."&question_text=".$_GET["question_text"]."");
            }    
        }
    }

?>