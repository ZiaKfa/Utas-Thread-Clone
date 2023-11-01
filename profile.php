<?php
session_start();
include 'navbar.php';
include 'functions.php';
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
$username = $_SESSION["username"];
$user = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$username'");
$row = mysqli_fetch_assoc($user);
$id = $row["id"];
$useruid = $row["username"];
$email = $row["email"];

?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
                integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
                crossorigin="anonymous"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
                href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
                rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="index.css" />
        <link rel="icon" href="img/q!.ico" type="image/x-icon">
        <title>Queasy - Profile</title>
    </head>
    <body class="bg-body-tertiary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required value="<?php echo $username ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required value="<?php echo $email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password to update profile" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="save" id="save">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    $newusername = $_POST["username"];
    $newemail = $_POST["email"];
    $password = $_POST["password"];
    
    $query = "UPDATE user SET username = '$newusername', email = '$newemail' WHERE id = '$id'";  
    $newuser = mysqli_fetch_assoc($user);
    //cek password
    if(isset($_POST["save"])){
        if(password_verify($password, $row["password"])){
            $result = mysqli_query($mysqli,$query);
            if($result){
                $_SESSION["username"] = $newusername;
                echo "<script>
                        alert('Profile updated!');
                        document.location.href = 'index.php';
                    </script>";

            } else {
                echo "<script>
                    alert('Profile update failed!');
                </script>";
            }
        } else {
            echo "<script>
                    alert('Wrong password!');
                </script>";
        }
    }
?>