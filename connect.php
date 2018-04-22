<?php
/**
 * Created by PhpStorm.
 * User: dinhquan
 * Date: 13/04/2018
 * Time: 13:51
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sarahah";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,'utf8');