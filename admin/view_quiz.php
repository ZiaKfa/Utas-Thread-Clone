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
    if($_GET["categ_id"] != ""){
        $categ_id = $_GET["categ_id"];
        $categ_name = $_GET["name"];
        $result = mysqli_query($mysqli, "SELECT * FROM quizzes WHERE category_id = $categ_id"); 
    } else {
        $categ_name = "All";
        $result = mysqli_query($mysqli, "SELECT * FROM quizzes");
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
    <p>Tabel Quiz</p>
    <?php
        echo "<p>Category: $categ_name</p>";
    ?>
    <p>Buat Quiz : <a href="index.php?content=create&table=quizzes&categ_id=<?php echo $categ_id ?>&categ_name=<?php echo $categ_name ?>">Disini</a></p>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Pembuat</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i = 1;
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$row["title"]."</td>";
                echo "<td>".$row["description"]."</td>";
                $category_query = mysqli_query($mysqli, "SELECT * FROM category");
                while($category = mysqli_fetch_assoc($category_query)){
                    if($category['id'] == $row['category_id']){
                        echo "<td>".$category['category_name']."</td>";
                    }
                } 
                $user_query = mysqli_query($mysqli, "SELECT * FROM user");
                while($user = mysqli_fetch_assoc($user_query)){
                    if($user['id'] == $row['creator_id']){
                        echo "<td>".$user['username']."</td>";
                    }
                    
                } 
                echo "<td><a href='index.php?content=edit&table=quizzes&id=$row[id]&title=$row[title]&desc=$row[description]&categ_id=$categ_id&categ_name=$categ_name'>Edit</a> | <a href='index.php?content=questions&quiz_id=".$row["id"]."&quiz_name=".$row["title"]."'>Manage Question</a> |<a href='delete.php?table=quizzes&id=".$row["id"]."&categ_id=$categ_id&categ_name=$categ_name'>Delete</a></td> ";
                echo "</tr>";
                $i++;
            }

        ?>
    </table>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>