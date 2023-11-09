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
    $result = mysqli_query($mysqli, "SELECT * FROM category");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <p>Tabel Category</p>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Category Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
            $i = 1;
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$row["category_name"]."</td>";
                echo '<td><img src="../img/'.$row["img"].'" alt="img not found" height="50px" width="50px"></td>';
                echo "<td><a href='index.php?content=quiz&categ_id=".$row["id"]."&name=".$row["category_name"]."'>Manage Quiz</a></td>";
                echo "</tr>";
                $i++;
            }

        ?>
    </table>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>