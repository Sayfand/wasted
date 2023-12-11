<?php
// Стандартное подключение к БД
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "test_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
// Проверка подключения
if(!$conn) {
    echo "Connection Failed";
}
