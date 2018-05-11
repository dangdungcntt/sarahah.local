<?php 
    session_start();
    require_once 'connect.php';
    if(isset($_POST['btnSend'])){
       $userid =  $_GET['userid'];
       $noidung = $_POST['noidung'];
       $query = "insert into message (idreceive, content) values ('{$userid}','{$noidung}')";
       $result = $conn->query($query);
       if($result === true){
            header("location: home.php");
       }

    }
    $userid =  $_GET['userid'];
    // $tontai = 
    $query = "select * from users where id = '{$userid}'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();
    if(empty($userid) || empty($user)){
        require_once ('404.php');
        die();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sarahah - Quan Luong</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/Setting.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/send.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
        <?php 
            if(empty($_SESSION['email'])){
                require __DIR__ . "/page/menu1.html";
            }
            else{
                require __DIR__ . "/page/menu2.html";
            }
         ?>
        <div class="content">
            <div class="img">
                <img src="img/avatar.jpg" style="width: 150px;height: 150px;" alt="">
            </div>
            <div class="row">
                <div class="mess col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <h3 class="text-center"><?php echo $user['name']; ?></h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="7" id="comment" name="noidung"></textarea>
                        </div>
                        <button class="btn btn-primary center-block" name="btnSend">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>