<?php
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$name = $_POST['name'];
$message = $_POST['message'];
$date = date("Y-m-d");

$connect = new mysqli('localhost', 'root', 'root', 'olimpics');
$connect->query("INSERT INTO `connection` (`FIO`, `email`, `telephone`, `message`, `date`) VALUES ('$name', '$email', '$telephone', '$message', '$date'");
$connect->close();
header('Location: /index.php');