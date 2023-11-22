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
    if($_GET["quiz_id"]!=""){
        $quiz_id = $_GET["quiz_id"];
        $quiz_name = $_GET["quiz_name"];
        $result = mysqli_query($mysqli, "SELECT * FROM questions WHERE quiz_id = $quiz_id"); 
    } else {
        $quiz_name = "All";
        $result = mysqli_query($mysqli, "SELECT * FROM questions");
    }
   

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
    <title>User</title>
</head>
<body>
    <p class="fw-bold fs-2 me-2 mb-3">Questions Table</p>
    <?php
        echo "<p class='my-1 fw-medium me-2'>Quiz: $quiz_name</p>";
    ?>
    <p class="fw-medium me-2">Create Question : <a href="create.php?table=questions&quiz_id=<?php echo $quiz_id ?>&quiz_name=<?php echo $quiz_name ?>">here!</a></p>
    <div class="table col-12">
    <table border="1" class="table table-striped">
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
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$row["quest_text"]."</td>";
                echo "<td class='text-center'><a href='index.php?content=edit&table=question&id=$row[id]&quest_text=$row[quest_text]&quiz_id=".$quiz_id."&quiz_name=".$quiz_name."'><button class='btn btn-primary'>Edit</button></a> <a href='index.php?content=options&question_id=".$row["id"]."&question_text=".$row["quest_text"]."'><button class='btn btn-primary'>Manage Option</button></a> <a href='delete.php?table=questions&id=".$row["id"]."&quiz_id=".$quiz_id."&quiz_name=".$quiz_name."'><button class='btn btn-danger'>Delete</button></a></td> ";
                echo "</tr>";
                $i++;
            }
        ?>
        </tbody>
    </table>
    </div>
    <a href="index.php"><button class="btn btn-primary me-2 mb-3">Kembali</button></a>
</body>
</html>