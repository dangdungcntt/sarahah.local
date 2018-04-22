<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sarahah - Quan Luong</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/Setting.css">
    <link rel="stylesheet" href="css/send.css">
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
            <div class="img">
                <img src="img/avatar.jpg" alt="">
            </div>
            <div class="row">
                <div class="mess col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <h3 class="text-center">Quan Luong</h3>
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="7" id="comment"></textarea>
                        </div>
                        <button class="btn btn-primary center-block">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>