<?php
require_once "connect.php";
if (isset($_POST['btnRegister'])) {
    $email = htmlspecialchars($_POST['email']);
    $pawword = md5(htmlspecialchars($_POST['password']));
    $repawword = md5(htmlspecialchars($_POST['repassword']));
    $username = htmlspecialchars($_POST['name']);
    if ($pawword != $repawword) {
        $error = "Mật khẩu ko trùng khớp";
    } else {
        $query = "select email from users where email = '{$email}'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $error = "Taì khoản đã tồn tại";
        } else {
            $query = "insert into `users`(`name`, `email`, `password`) values ('{$username}','{$email}','{$pawword}')";
            $result = $conn->query($query);
            print_r($result);
            if ($result) {
                header("location: login.php");
            }
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Sarahah</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header1.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="">
    <?php require __DIR__ . "/page/menu1.html"; ?>
    <h1 class="text-center">Register</h1>
    <div class="content col-lg-4 col-lg-offset-4 col-md-8 col-md-offset-2">
        <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Enter your email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="">Password Confimation</label>
                <input type="password" name="repassword" class="form-control"
                       placeholder="Enter your password confimation">
            </div>
            <button class="btn btn-primary" name="btnRegister">Register</button>
        </form>
    </div>

</div>
<div class="footer">

</div>
</div>
</html>