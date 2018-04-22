<?php
    if(isset($_POST['btnDelete'])){
        $email = $_SESSION['email'];
        $query = "delete from users where email = '{$email}'";
        $result = $conn->query($query);
        header("location: logout.php");
    }
?>

<?php
/**
 * Created by PhpStorm.
 * User: dinhquan
 * Date: 13/04/2018
 * Time: 11:20
 */?>
<h2>Remove Account</h2>
<div class="form-group has-error">
    <p class="text-danger" style="font-size: 16px; font-weight: bold;">Are you sure that you want to delete your account?</p>
    <p class="text-danger" style="font-size: 16px; font-weight: bold;">Deleting the account is irreversible!</p>
</div>
<a class="btn btn-default">Cancel</a>
<form action="" method="post">
    <button class="btn btn-danger" name="btnDelete">Remove</button>
</form>
