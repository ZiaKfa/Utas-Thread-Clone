<?php
    session_start();
    require_once("config.php");
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    $user_id = $_SESSION["id"];
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
    <title>Create Quiz</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
    <div class="card w-50 m-auto shadow mt-5">
    <form action="" method="post">
        <h2 class="text-center fw-semibold mt-4 mb-3">Create Quiz</h2>
        <table>
            <tr>
                <td>Title</td>
                <td>:</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td><textarea name="desc" cols="30" rows="4"></textarea></td>
            </tr>
            <tr>
                <td>Category</td>
                <td>:</td>
                <td><select name="category" id="category">
                    <?php
                        $category_query = mysqli_query($mysqli, "SELECT * FROM category");
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
                <td></td>
                <td></td>
                <td><button type="submit" name="submit" class="mb-3">Next</button></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        $category = $_POST["category"];
        $creator = $user_id;
        $query = "INSERT INTO quizzes (title, description, category_id, creator_id) VALUES ('$title', '$desc', '$category', '$creator')";
        mysqli_query($mysqli, $query);
        header("Location:create_questions.php?quiz_id=$mysqli->insert_id");
    }