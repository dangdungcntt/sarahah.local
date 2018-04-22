<?php
/**
 * Created by PhpStorm.
 * User: dinhquan
 * Date: 13/04/2018
 * Time: 10:55
 */
?>
<h2>Horizontal form</h2>
<hr>
<form class="form-horizontal" action="/action_page.php">
    <div class="has-error"></div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Enter your name" name="name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" placeholder="Enter your email" name="email">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>