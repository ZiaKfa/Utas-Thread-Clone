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
    <title>User</title>
</head>
<body>
    <p>Tabel Option</p>
    <?php
        echo "<p>For question: $quest_text</p>";
    ?>
     <p>Buat Pilihan Ganda : <a href="create.php?table=options&quest_id=<?php echo $quest_id ?>&quest_text=<?php echo $quest_text ?>">Disini</a></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Options</th>
            <th>Is Correct</th>
            <th>Aksi</th>
        </tr>
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
                echo "<td><a href='index.php?content=edit&table=option&id=$row[id]&option_text=$row[option_text]&question_id=".$quest_id."&question_text=".$quest_text."'>Edit</a> | <a href='delete.php?table=options&id=".$row["id"]."&question_id=".$quest_id."&question_text=".$quest_text."'>Delete</a></td> ";
                echo "</tr>";
                $i++;
            }

        ?>
    </table>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>