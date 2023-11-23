<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    $id = $_GET["id"];
    $result = mysqli_query($mysqli, "SELECT * FROM questions WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
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
    <title>Create Question</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="card w-50 m-auto shadow mt-5">
        <h2 class="text-center fw-semibold mt-4 mb-3">Edit Question</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td style="width: 18%">Question</td>
                    <td style="width: 2%">:</td>
                    <td style="width: 80%"><textarea name="quest_text" rows="3"><?php echo $row["quest_text"]?></textarea></td>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button type="submit" name="submit">Create</button></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $quest_text = $_POST["quest_text"];
        $result = mysqli_query($mysqli, "update questions set quest_text = '$quest_text' where id = '$id'");
        if($result){
            header("Location: my_questions.php?id=$row[quiz_id]");
        }
    }
?>