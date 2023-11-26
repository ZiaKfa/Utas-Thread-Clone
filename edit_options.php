<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    $id = $_GET["id"];
    $result = mysqli_query($mysqli, "SELECT * FROM options WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
    $quest_id = $row["question_id"];
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
    <title>Document</title>

</head>
<body>
    <?php include("navbar.php") ?>
< <div class="card w-50 m-auto shadow mt-5">
        <h2 class="text-center fw-semibold mt-4 mb-3">Edit Question</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Option text</td>
                    <td><input type="text" name="option_text" value="<?php echo $row["option_text"] ?>"></td>
                </tr>
                <tr>
                    <td>Is answer</td>
                    <td><input type="checkbox" name="is_answer" value="1">Benar</td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Edit</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $option_text = $_POST["option_text"];
        $is_answer = $_POST["is_answer"];
        if(!isset($is_answer)){
            $is_answer = 0;
        }
        $sql = "UPDATE options SET option_text = '$option_text', is_answer = '$is_answer' WHERE id = '$id'";
        $result = mysqli_query($mysqli, $sql);
        if($result){
           echo "<script>alert('Edit option berhasil!')
              window.location='my_options.php?id=$quest_id';
           </script>";
        }
    }