<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="category d-flex justify-content-between">
            <h2>Category</h2>
            <a href="#"><button class="btn btn-warning">+ New quiz</button></a>
        </div>

    <?php
        $result = mysqli_query($mysqli, "SELECT * FROM category ");
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="title d-flex justify-content-between">';
            echo "<h4>$row[category_name]</h4>";
            echo '<a href="#" class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#hiddenCards">View all</a>';
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