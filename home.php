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
    $query2 = "select name from users where id = {$id}";
    $result2 = $conn->query($query2);
    $username = $result2->fetch_assoc();
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
    <?php require __DIR__ . "/page/menu2.html" ; ?>
    <div class="content">
        <div class="row">
            <div class="information col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="info">
                    <div class="img">
                        <img src="img/avatar.jpg" style="width: 100px; height: 100px;">
                    </div>
                    <div class="my-name">
                        <!-- <i class="material-icons" style="font-size: 16px; color: dodgerblue">settings</i> -->
                        <span><?php echo $username['name']; ?></span>
                    </div>
                    <div class="my-page">
                        <a href="https://chát.vn/send.php?userid=<?php echo $id; ?>">https://chát.vn/send.php?userid=<?php echo $id ?></a>
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
                        <!-- <li><a data-toggle="tab" href="#menu2">Favorities</a></li>
                        <li><a data-toggle="tab" href="#menu3">Sent</a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="clearfix">
                                <?php foreach ($array_content as $content): ?>
                                    <?php $idMess = $content['id'];?>

                                    <div class="alert alert-dismissible message">
                                        <a class="close xxx" data-dismiss="alert" aria-label="close" message-id = "<?php echo $idMess ?>">&times;</a>
                                        <p class="text-left"><?php echo $content['content'] ?> 
                                            <a href="generateImg.php?message-id=<?php echo $idMess; ?>">
                                                <i class="fa fa-facebook-official" style="font-size: 18px;color: #3b5998;"></i>
                                            </a>
                                        </p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                       <!--  <div id="menu2" class="tab-pane fade">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/delete.js"></script>
</body>
</html>