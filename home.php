<?php
    session_start();
    require_once "connect.php";
    if(empty($_SESSION['id'])){
        header("location: login.php");
    }
    $id = $_SESSION['id'];
    $query = "select id,content from message where idreceive = '{$id}'";
    $result = $conn->query($query);
    $array_content = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($array_content,$row);
        }
        rsort($array_content);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sarahah</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <li><a href="home.php">My Message</a></li>
                    <li><a href="setting.php?page=information">Setting</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="row">
            <div class="information col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="info">
                    <div class="img">
                        <img src="img/avatar.jpg" alt="">
                    </div>
                    <div class="my-name">
                        <i class="material-icons" style="font-size: 16px; color: dodgerblue">settings</i>
                        <span>Quan Luong</span>
                    </div>
                    <div class="my-page">
                        <a href="sarahah.local/send.php?user=dinhquan157">sarahah.local/send?dinhquan157</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="title col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 text-center">
                <div class="message">
                    <i class="fa fa-comments" style="font-size: 40px"> Message</i>
                </div>
                <div class="tab col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Recieved</a></li>
                        <li><a data-toggle="tab" href="#menu2">Favorities</a></li>
                        <li><a data-toggle="tab" href="#menu3">Sent</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="clearfix">
                                <?php foreach ($array_content as $content): ?>
                                    <div class="alert alert-dismissible message">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p class="text-left"><?php echo $content['content'] ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="clearfix">
                                <div class="alert alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p class="text-left">aaaaaaaa.</p>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div class="clearfix">
                                <div class="alert alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p class="text-left">aaaaaaaa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>