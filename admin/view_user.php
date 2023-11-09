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
    $result = mysqli_query($mysqli, "SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <p>Tabel User</p>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i = 1;
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td><a href='index.php?content=edit&table=user&id=$row[id]&username=$row[username]&email=$row[email]'>Edit</a> | <a href='delete.php?table=user&id=".$row["id"]."'>Delete</a></td>";
                echo "</tr>";
                $i++;
            }

        ?>
    </table>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>