<?php
session_start();
$authType = $_POST['authType'];
$email = $_POST['email'];
$login = explode("@", $email)[0];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

$_SESSION["login"] = $login;

$connect = new mysqli('localhost', 'root', '', 'olimpics');
if ($authType) {
  $result = $connect->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
  $user = $result->fetch_assoc();
  if ($user != null) {
    header('Location: /index.php');
  } else {
  }
} else {
  $connect->query("INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$password')");
  $connect->close();
  header('Location: /index.php');
}
