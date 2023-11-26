<?php
    session_start();
    include "functions.php";
    $quiz_id = $_GET["id"];
    $sql = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
    $result = mysqli_query($mysqli, $sql);
    if(!$result){
        echo "Error : ".mysqli_error($conn);
    }
    $quiz = mysqli_fetch_assoc($result);
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
    <p class="fw-bold fs-1 me-2 mb-3 text-center">Questions Table</p>
    <p class="fw-medium me-4">Create Question : <a href="create_questions.php?quiz_id=<?php echo $quiz_id ?>&go=my">here!</a></p>
    <div class="table col-12">
    <table border="1" class="table table-striped m-auto" style="width: 96%">
        <thead>
            <tr>
            <th>No.</th>
            <th>Question</th>
            <th class='text-center'>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $res = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$row["quest_text"]."</td>";
                echo "<td class='text-center w-25'><a href='edit_questions.php?id=".$row["id"]."'</a><button class='btn btn-primary'>Edit</button></a> <a href='delete_questions.php?id=".$row["id"]."&quiz_id=".$row["quiz_id"]."'><button class='btn btn-danger'>Delete</button></a> 
                    <a href='my_options.php?id=".$row["id"]."'><button class='btn btn-success'>Manage Options</button></a>
                </td> ";
                echo "</tr>";
                $i++;
            }
        ?>
        </tbody>
    </table>
    </div>
    <a href="my_quiz.php"><button class="btn btn-primary me-4 mb-3">Kembali</button></a>
</body>
</html>