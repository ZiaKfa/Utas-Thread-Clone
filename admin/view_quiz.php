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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
      crossorigin="anonymous"
    />
    <title>User</title>
</head>
<body>
    <p class="fw-bold fs-2 me-2 mb-3">Quiz Table</p>
    <?php
        echo "<p class='my-1 fw-medium me-2'>Category: $categ_name</p>";
    ?>
    <p class="fw-medium me-2">Create quiz : <a href="index.php?content=create&table=quizzes&categ_id=<?php echo $categ_id ?>&categ_name=<?php echo $categ_name ?>">here!</a></p>
    <div class="table col-12">
    <table border="1" class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Creator</th>
                <th class='text-center'>Action</th>
            </tr>
        </thead>
        <tbody>
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
                    echo "<td class='text-center'><a href='index.php?content=edit&table=quizzes&id=$row[id]&title=$row[title]&desc=$row[description]&categ_id=$categ_id&categ_name=$categ_name'><button class='btn btn-primary'>Edit</button></a> <br> <a href='index.php?content=questions&quiz_id=".$row["id"]."&quiz_name=".$row["title"]."'><button class='btn btn-primary my-1'>Manage Question</button></a> <br> <a href='delete.php?table=quizzes&id=".$row["id"]."&categ_id=$categ_id&categ_name=$categ_name'><button class='btn btn-danger'>Delete</button></a></td> ";
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