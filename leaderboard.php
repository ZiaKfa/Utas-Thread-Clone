<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    $user = mysqli_query($mysqli,"SELECT * FROM user ORDER BY score DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php
            $rank = 1;
            while($row = mysqli_fetch_assoc($user)){
                echo "<tr>";
                echo "<td>".$rank."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['score']."</td>";
                echo "</tr>";
                $rank++;
            }
        ?>
    </table>
</body>
</html>