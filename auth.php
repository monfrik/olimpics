<?php
session_start();
$authType = $_POST['authType'];
$email = $_POST['email'];
$login = explode("@", $email)[0];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

$_SESSION["login"] = $login;

$connect = new mysqli('localhost', 'root', 'root', 'olimpics');
if ($authType) {
  $result = $connect->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
  $user = $result->fetch_assoc();
  header('Location: /index.php');
} else {
  $connect->query("INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$password')");
  $connect->close();
  header('Location: /index.php');
}
