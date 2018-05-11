<?php
    session_start();
    require_once "connect.php";
    if(!empty($_SESSION['id'])){
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="">
            <?php require __DIR__ . "/page/menu1.html"; ?>
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