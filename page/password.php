<?php
/**
 * Created by PhpStorm.
 * User: dinhquan
 * Date: 13/04/2018
 * Time: 11:06
 */?>
<?php
    if(isset($_POST['btnSubmit'])){
        $current_pass = md5(htmlspecialchars($_POST['current-pass']));
        $new_pass= md5(htmlspecialchars($_POST['new-pass']));
        $re_pass = md5(htmlspecialchars($_POST['re-pass']));
        if($new_pass != $re_pass){
            $error = "Hai mật khẩu không trùng khớp";
        }
        else{
            $query = "select password from users where id = '{$id}'";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $pass = $row['password'];
                if($pass != $current_pass){
                    $error = "Mật khẩu hiện tại không chính xác";
                }
                else{
                    $query = "update users set password = '{$new_pass}' where id = '{$id}'";
                    $conn->query($query);
                    $success = "Change password successfully";
                }
            }
        }
    }
?>
<h2>Change Password</h2>
<hr>
<form class="form-horizontal" method="post">
    <?php
    if(isset($error)){
        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    }
    if(isset($success)){
        echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
    }
    ?>
    <div class="form-group">
        <label class="control-label col-sm-4" for="email">Current Password:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" placeholder="Enter your current password" name="current-pass">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="pwd">New Password:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" placeholder="Enter your new password" name="new-pass">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="pwd">New Password Confirmation:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" placeholder="Enter your new password confirmation" name="re-pass">
        </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
    </div>
</form>