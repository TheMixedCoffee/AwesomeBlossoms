<?php
$user = 'root';
$pass = '';
$db = 'AwesomeBlossoms';
session_start();
$conn = mysqli_connect('localhost',$user,$pass,$db);
if(!$conn){
    header("Location:ServerError.php");
}
?>