<?php
    session_start();
    require_once "connect.php";
    if(empty($_SESSION['id'])){
        header('Location: login.php');
    }
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/Setting.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div>
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
            <div class="left col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-1 col-xs-10 col-xs-offset-1">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="setting.php?page=information">
                            <span class="glyphicon glyphicon-user"></span>
                            <span>Personal information</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="setting.php?page=password">
                            <span class="glyphicon glyphicon-lock"></span>
                            <span>Password</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="setting.php?page=remove">
                            <span class="glyphicon glyphicon-remove" style="color: red"></span>
                            <span>Remove Account</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1">
                <div class="">
                    <?php
                        if($_GET['page'] == "information"){
                            require __DIR__ . "/page/information.php";
                        }
                        elseif($_GET['page'] == "password"){
                            require __DIR__ . "/page/password.php";
                        }
                        elseif($_GET['page'] == "remove"){
                            require __DIR__ . "/page/remove.php";
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="js/delete.js"></script>
</body>
</html>