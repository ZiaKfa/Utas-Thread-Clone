<?php
    session_start();
    require_once("functions.php");
    if(!isset($_SESSION["login"])){
        header("Location:login.php");
        exit;
    }
    $id = $_GET["id"];
    $result = mysqli_query($mysqli, "SELECT * FROM options WHERE question_id = '$id'");
    $quiz_id = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM questions WHERE id = '$id'"))["quiz_id"];
    $_SESSION["last_url"] = "my_options.php?id=$id";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <link rel="stylesheet" href="index.css" />
    <link rel="icon" href="img/q!.ico" type="image/x-icon">

    <title>User</title>
</head>
<body>
    <?php include('navbar.php');?>
    <p class="fw-bold fs-2 me-2 mb-3">Option Table</p>
    <p class="fw-medium me-2">Create multiple choice : <a href="create_options.php?id=<?php echo $id ?>">here!</a></p>
    <div class="table col-12">
    <table class="table table-striped" border='1'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Options</th>
                <th>Is Correct</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>".$row["option_text"]."</td>";
                    echo "<td>";
                        if($row["is_answer"] == 1){
                            echo "True";
                        }else{
                            echo "False";
                        }
                    echo "</td>";
                    echo "<td class='text-center'><a href='edit_options.php?id=$row[id]'><button class='btn btn-primary'>Edit</button></a> <a href='delete_options.php?id=".$row["id"]."&quest_id=".$row["question_id"]."'><button class='btn btn-danger'>Delete</button></a></td> ";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </tbody>
    </table>
    </div>
    <a href="my_questions.php?id=<?php echo $quiz_id ?>"><button class="btn btn-primary me-2 mb-3">Kembali</button></a>
</body>
</html>