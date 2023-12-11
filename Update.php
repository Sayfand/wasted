<?php
require_once 'db_conn.php';
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['pass'];
// Присвоение полученных данных к переменным и изменение их в БД через UPDATE 
mysqli_query($conn, "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `pass` = '$pass' WHERE `users`.`id` = '$id'");
// Переадресация на страницу пользователя
header ("Location: home.php");
