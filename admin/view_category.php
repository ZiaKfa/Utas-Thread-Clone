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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
      crossorigin="anonymous"
    />
    <title>User</title>
</head>
<body>
    <p class="fw-bold fs-2 me-2 mb-3">Category Table</p>
    <div class="table col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>".$row["category_name"]."</td>";
                    echo '<td><img src="../img/'.$row["img"].'" alt="img not found" height="50px" width="50px"></td>';
                    echo "<td class='text-center'><a href='index.php?content=quiz&categ_id=".$row["id"]."&name=".$row["category_name"]."'><button class='btn btn-primary'>Manage Quiz</button></a></td>";
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