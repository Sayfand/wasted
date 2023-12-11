<?php
// Подключение к БД
require_once("db_conn.php");
$uname = $_POST ['uname'];
$name = $_POST ['name'];
$email = $_POST ['email'];
$phone = $_POST ['phone'];
$pass = $_POST ['pass'];
$repeatpass = $_POST ['repeat_password'];
// Проверка полей
if (empty($uname) || empty ($name) || empty ($email) || empty ($phone) || empty($pass) || empty ($repeatpass)){
    echo "Заполните все поля";
} else {
    // Проверка пароля
    if($pass != $repeatpass){
        echo "Пароли не совпадают";
    } else {
        // Проверка, если все ок, то регистрация завершается и идет переброс на страницу авторизации
        $sql = "INSERT INTO `users` (uname, name, email, phone, pass) VALUES ('$uname','$name','$email','$phone','$pass')";
        if ($conn -> query($sql) === TRUE){
            echo "Успешная регистрация";
            header("location: index.php");
        } else {
            echo "Ошибка:" . $conn->error;
        }
        

        }
        
    } 

