<?php
    session_start();
    require_once "connect.php";

    if(!empty($_SESSION['email'])){
        header('Location: home.php');
    }
    if(isset($_POST['login'])){
        $email = htmlspecialchars($_POST['email']);
        $password = md5($_POST['password']);
        $query = "select email from users where email = '{$email}' and password='{$password}'";
        $result = $conn->query($query);
        if($result->num_rows>0){
            $query = "select id from users where email = '{$email}'";
            $result = $conn->query($query);
            if($result->num_rows>0){
                $id = $result->fetch_assoc();
                $_SESSION['id'] = $id['id'];

                header('Location: home.php');
            }

        }
        else {
            $error = "Taì khoản hoặc mật khẩu ko chính xác";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="home">
                    <a class="" href="#">
                        <img src="img/Logo.png" alt=""> Sarahah
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <!---->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="text-center">Login</h1>
    <div class="content col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
        <div class="login">
            <?php
            if(isset($error)){
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <label for="">
                    <input type="checkbox">Remmember me
                </label>
                <button class="btn btn-default" name="login">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>