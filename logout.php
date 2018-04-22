<?php
/**
 * Created by PhpStorm.
 * User: dinhquan
 * Date: 13/04/2018
 * Time: 14:56
 */
session_start();
unset($_SESSION);
session_destroy();
header('Location: login.php');
?>