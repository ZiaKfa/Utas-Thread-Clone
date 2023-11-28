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
    if($_GET["question_id"]!=""){
        $quest_id = $_GET["question_id"];
        $quest_text = $_GET["question_text"];
        $result = mysqli_query($mysqli, "SELECT * FROM options WHERE question_id = $quest_id"); 
    } else {
        $quest_text = "All";
        $result = mysqli_query($mysqli, "SELECT * FROM options");
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
    <p class="fw-bold fs-2 me-2 mb-3">Option Table</p>
    <?php
        echo "<p class='my-1 fw-medium me-2'>For question: $quest_text</p>";
    ?>
    <p class="fw-medium me-2">Create multiple choice : <a href="index.php?content=create&table=options&quest_id=<?php echo $quest_id ?>&quest_text=<?php echo $quest_text ?>">here!</a></p>
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
                    echo "<td class='text-center'><a href='index.php?content=edit&table=option&id=$row[id]&option_text=$row[option_text]&question_id=".$quest_id."&question_text=".$quest_text."'><button class='btn btn-primary'>Edit</button></a> <a href='delete.php?table=options&id=".$row["id"]."&question_id=".$quest_id."&question_text=".$quest_text."'><button class='btn btn-danger'>Delete</button></a></td> ";
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