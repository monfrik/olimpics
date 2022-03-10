<?php
$from = $_POST['from'];
$to = $_POST['to'];
$quantity = $_POST['quantity'];

$connect = new mysqli('localhost', 'root', 'root', 'olimpics');
$result = $connect->query("SELECT * FROM `tours` WHERE `from` = '$from' AND `to` = '$to' AND `quantity` = $quantity");
$tours = $result->fetch_all(MYSQLI_ASSOC);
$params = json_encode($tours);
header("Location: /index.php?tours=$params");
