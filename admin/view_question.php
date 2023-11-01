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
    $quiz_id = $_GET["quiz_id"];
    $quiz_name = $_GET["quiz_name"];
    $result = mysqli_query($mysqli, "SELECT * FROM questions WHERE quiz_id = $quiz_id");
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <p>Tabel Question</p>
    <?php
        echo "<p>Quiz: $quiz_name</p>";
    ?>
     <p>Buat Soal : <a href="create.php?table=questions&quiz_id=<?php echo $quiz_id ?>&quiz_name=<?php echo $quiz_name ?>">Disini</a></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Question</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i = 1;
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$row["quest_text"]."</td>";
                echo "<td><a href='edit.php?table=question&id=$row[id]&quest_text=$row[quest_text]&quiz_id=".$quiz_id."&quiz_name=".$quiz_name."'>Edit</a> | <a href='view_option.php?question_id=".$row["id"]."&question_text=".$row["quest_text"]."'>Manage Option</a> |<a href='delete.php?table=questions&id=".$row["id"]."&quiz_id=".$quiz_id."&quiz_name=".$quiz_name."'>Delete</a></td> ";
                echo "</tr>";
                $i++;
            }

        ?>
    </table>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>