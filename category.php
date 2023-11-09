<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-8 m-3 py-3 px-4 bg-white rounded-4 shadow-sm">
            <h1>Hi, <?php echo $_SESSION["username"]; ?>!👋</h1>
            <p>Let's start your quiz!</p>
        </div>
        <div class="col-3 d-flex flex-column align-items-center my-3 p-3 bg-white rounded-4 shadow-sm">
            <p>Create your own quiz here</p>
            <a href="create_quiz.php"><button class="btn btn-warning">+ New quiz</button></a>
        </div>
        <div class="category">
            <h3>Category</h3>
        </div>

    <?php
        $result = mysqli_query($mysqli, "SELECT * FROM category ");
        while($row = mysqli_fetch_assoc($result)){
            $categ_id = $row["id"];
            echo '<div class="title d-flex justify-content-between">';
            echo "<h4>$row[category_name]</h4>";
            echo '<a href="view_category.php?id='.$categ_id.'" class="text-decoration-none text-dark">View all</a>';
            echo '</div>';
            $result2 = mysqli_query($mysqli, "SELECT * FROM quizzes WHERE category_id = $row[id] LIMIT 4");
            while($row2 = mysqli_fetch_assoc($result2)){
                echo '<div class="col-3 mb-5 mt-2">';
                echo '<a href="quiz.php?id='.$row2["id"].'" class="text-decoration-none">';
                echo '<div class="card shadow" style="width: 16rem;">';
                echo '<img src="img/'.$row['img'].'" class="card-img-top mt-2" alt="img/'.$row['img'].'">';
                echo '<div class="card-body">';
                echo "<p class='card-text'>$row2[title]</p>";
                echo '</div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }
    ?>
    </div>
</div>